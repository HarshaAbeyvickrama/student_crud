<!DOCTYPE html>
<html>

<head>
    <title>Student Data Form</title>
    <title>Student Data Collection</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
        }

        form {
            background-color: white;
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .form-group {
            margin-bottom: 10px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input,
        select {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #f2f2f2;
            width: 100%;
            margin-bottom: 10px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #3e8e41;
        }
    </style>
</head>

<body>
    <h1>Student Data Form</h1>
    <form action="insert.php" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" required>
        </div>
        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" name="age" required>
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth:</label>
            <input type="date" name="dob" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select name="gender" required>
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
        <button type="submit" name="submit">Submit</button>
    </form>

    <?php
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "student_data";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query the database for all student records
    $sql = "SELECT * FROM students";
    $result = mysqli_query($conn, $sql);

    // Check if any records were returned
    if (mysqli_num_rows($result) > 0) {
        // If records were returned, create a table to display the data
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Address</th><th>Age</th><th>Date of Birth</th><th>Gender</th><th></th><th></th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>" . $row["age"] . "</td>";
            echo "<td>" . $row["dob"] . "</td>";
            echo "<td>" . $row["gender"] . "</td>";
            echo "<td><a href='update.php?id=" . $row["id"] . "'>Update</a></td>";
            echo "<td><a href='delete.php?id=" . $row["id"] . "'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        // If no records were returned, display a message
        echo "No data to show.";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>

</body>

</html>