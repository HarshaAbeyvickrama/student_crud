<?php
// Include the database configuration file
require_once 'db_config.php';

// Create connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$id = $_GET['id'];

// Prepare statement
$stmt = $conn->prepare("DELETE FROM students WHERE id=?");
$stmt->bind_param("i", $id);

// Execute statement
if ($stmt->execute() === TRUE) {
    echo "Record deleted successfully. <a href='/student_crud/'>Back</a>";
} else {
    echo "Error deleting record: " . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
