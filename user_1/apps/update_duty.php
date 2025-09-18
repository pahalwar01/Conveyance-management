<?phpinclude '../../connection/connection.php';

$rider_id = $_POST['rider_id'] ?? null;
$lat = $_POST['latitude'] ?? null;
$lng = $_POST['longitude'] ?? null;

if (!$rider_id || !$lat || !$lng) {
    echo json_encode(["status" => "error", "message" => "Missing parameters"]);
    exit;
}

// location DB में save/update करें
$stmt = $conn->prepare("UPDATE riders SET latitude = ?, longitude = ?, last_updated = NOW() WHERE rider_id = ?");
$stmt->bind_param("ddi", $lat, $lng, $rider_id);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Location updated"]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to update"]);
}
?>
