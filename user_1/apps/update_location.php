<?php
header("Content-Type: application/json");
$input = json_decode(file_get_contents("php://input"), true);

if(!$input){
    http_response_code(400);
    echo json_encode(["error"=>"No input received"]);
    exit;
}

$rider = $input['rider_id'] ?? null;
$lat   = $input['lat'] ?? null;
$lng   = $input['lng'] ?? null;

if(!$rider || !$lat || !$lng){
    http_response_code(400);
    echo json_encode(["error"=>"Missing fields"]);
    exit;
}

try {
    $pdo = new PDO("mysql:host=localhost;dbname=myconveyance;charset=utf8", "dbuser", "dbpass", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    $stmt = $pdo->prepare("INSERT INTO rider_locations (rider_id, lat, lng) 
        VALUES (?, ?, ?)
        ON DUPLICATE KEY UPDATE lat=VALUES(lat), lng=VALUES(lng), updated_at=NOW()");
    $stmt->execute([$rider, $lat, $lng]);

    echo json_encode(["status"=>"ok"]);
} catch (Exception $e){
    http_response_code(500);
    echo json_encode(["error"=>$e->getMessage()]);
}
