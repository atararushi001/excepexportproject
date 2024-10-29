<?php
include 'conection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] == 'delete') {
        $id = $_POST['id'];
        $sql = "DELETE FROM general WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Record deleted successfully!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete record.']);
        }
        $stmt->close();
        $conn->close();
        exit;
    }
    if (isset($_POST['action']) && $_POST['action'] == 'check_duplicate') {
        $mobileNumber = $_POST['mobilenumber'];
        if (isDuplicateMobileNumber($mobileNumber, $conn)) {
            echo json_encode(['status' => 'error', 'message' => 'Duplicate mobile number.']);
        } else {
            echo json_encode(['status' => 'success', 'message' => 'Mobile number is unique.']);
        }
        $conn->close();
        exit;
    }

    // Existing code for inserting data
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
    include 'conection.php';

    header('Content-Type: application/json');

    $sql = "SELECT id, client_name AS clientname, client_address AS clientaddress, whatsapp_number AS whatsappnumber, mobile_number AS mobilenumber, notes AS Notes, category FROM general";
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

function isDuplicateMobileNumber($mobileNumber, $conn) {
    $sql = "SELECT COUNT(*) FROM general WHERE mobile_number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $mobileNumber);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    return $count > 0;
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    fetchData();
}

?>