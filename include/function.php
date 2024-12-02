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
    // if (isset($_POST['action']) && $_POST['action'] == 'check_duplicate') {
        if (isset($_POST['action']) && $_POST['action'] == 'add_city') {
            $city = $_POST['city'];
            addCity($city);
        } elseif (isset($_POST['action']) && $_POST['action'] == 'check_duplicate_mobile') {
            $mobileNumber = $_POST['mobilenumber'];
            if (isDuplicateMobileNumber($mobileNumber, $conn)) {
                echo json_encode(['status' => 'error', 'message' => 'Duplicate mobile number.']);
            } else {
                echo json_encode(['status' => 'success', 'message' => 'Mobile number is unique.']);
            }
            $conn->close();
            exit;
        } elseif (isset($_POST['action']) && $_POST['action'] == 'check_duplicate_whatsapp') {
            $whatsappNumber = $_POST['whatsappnumber'];
            if (isDuplicateWhatsAppNumber($whatsappNumber, $conn)) {
                echo json_encode(['status' => 'error', 'message' => 'Duplicate WhatsApp number.']);
            } else {
                echo json_encode(['status' => 'success', 'message' => 'WhatsApp number is unique.']);
            }
            $conn->close();
            exit;
        }
        

    // Existing code for inserting data
    $clientName = $_POST['clientname'] ?? '';
    $clientAddress = $_POST['clientaddress'] ?? '';
    $whatsappNumber = $_POST['whatsappnumber'] ?? '';
    $city = $_POST['city'] ?? '';
    $mobileNumber = $_POST['mobilenumber'] ?? '';
    $notes = $_POST['Notes'] ?? '';
    $category = $_POST['category'] ?? '';

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO general (client_name, client_address,city, whatsapp_number, mobile_number, notes, category) VALUES (?, ?, ?, ?, ? , ?, ?)");
    $stmt->bind_param("sssssss", $clientName, $clientAddress,  $city, $whatsappNumber, $mobileNumber, $notes, $category);

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
function fetchCities() {
    global $conn;
    $sql = "SELECT city_name FROM city";
    $result = $conn->query($sql);

    $cities = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $cities[] = $row['city_name'];
        }
    }

    echo json_encode($cities);
    $conn->close();
}

function addCity($city) {
    global $conn;
    $sql = "INSERT INTO city (city_name) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $city);
    if ($stmt->execute()) {
        echo "City added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}

function fetchData() {
    include 'conection.php';

    header('Content-Type: application/json');

    $sql = "SELECT id, client_name AS clientname, client_address AS clientaddress, whatsapp_number AS whatsappnumber, mobile_number AS mobilenumber, notes AS Notes, category,city AS city FROM general";
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
    $sql = "SELECT COUNT(*) FROM general WHERE mobile_number = ? OR whatsapp_number = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $mobileNumber,$mobileNumber);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    return $count > 0;
}
function isDuplicateWhatsAppNumber($whatsappNumber, $conn) {
    $sql = "SELECT COUNT(*) FROM general WHERE whatsapp_number = ? OR mobile_number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $whatsappNumber,$whatsappNumber);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    return $count > 0;
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['action']) && $_GET['action'] == 'fetch_cities') {
        fetchCities();
    } else {
        fetchData();
    }
}

?>