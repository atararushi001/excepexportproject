<?php
include './conection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $clientName = $_POST['clientname'] ?? '';
    $clientAddress = $_POST['clientaddress'] ?? '';
    $whatsappNumber = $_POST['whatsappnumber'] ?? '';
    $mobileNumber = $_POST['mobilenumber'] ?? '';
    $notes = $_POST['Notes'] ?? '';
    $category = $_POST['category'] ?? '';

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO general (client_name, client_address, whatsapp_number, mobile_number, notes, category) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $clientName, $clientAddress, $whatsappNumber, $mobileNumber, $notes, $category);

    // Execute the statement
    if ($stmt->execute()) {
        $response = [
            'status' => 'success',
            'message' => 'Data submitted successfully!',
            'category' => $category
        ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Failed to submit data.',
            'category' => $category
        ];
    }

    $stmt->close();
    $conn->close();

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

function fetchData() {
    include './conection.php';

    // Enable error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    header('Content-Type: application/json');

    $sql = "SELECT client_name AS clientname, client_address AS clientaddress, whatsapp_number AS whatsappnumber, mobile_number AS mobilenumber, notes AS Notes, category FROM general";
    $result = $conn->query($sql);

    $data = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    echo json_encode(['data' => $data]);

    $conn->close();
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    fetchData();
}
?>