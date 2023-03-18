<?php
// Database credentials
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "student_data";

// Create connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if (isset($_POST['submit'])) {
    // Get form data
    $name = $_POST['name'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];

    // Insert data into database
    $sql = "INSERT INTO students (name, address, age, dob, gender) VALUES ('$name', '$address', '$age', '$dob', '$gender')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
