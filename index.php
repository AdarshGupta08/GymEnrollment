<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <title>Adi-Fitness</title>
</head>

<body>
    <header class="header">
        <div class="left">
            <img src="./logoo.png" alt="Adi-Fitness Logo">
            <div>Adi-Fitness</div>
        </div>
        <ul class="navbar">
            <li><a href="#" class="active">Home</a></li>
            <li><a href="#">Fitness Calculator</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">About Us</a></li>
        </ul>
        <div class="right">
            <button class="btn">Call Us Now</button>
            <button class="btn">Email Us</button>
        </div>
    </header>

    <div id="cont">
        <marquee behavior="slide" scrollamount="9" direction="down" loop="100">HELLO GYM RATS</marquee>
    </div>

    <div class="container">
        <h1>Join The Best GYM Of Thane Now</h1>
        <form id="gymForm" method="POST" action="">
            <div class="form-group">
                <input type="text" name="name" placeholder="Enter your Name" required>
                <input type="text" name="age" placeholder="Enter your Age" required>
                <input type="text" name="gender" placeholder="Enter your Gender" required>
                <input type="text" name="locality" placeholder="Enter your Locality" required>
                <input type="email" name="email" placeholder="Enter your Email Id" required>
                <input type="tel" name="phone" placeholder="Enter your Phone Number" required>
            </div>
            <button class="btn" type="submit">Submit</button>
        </form>
    </div>

<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form data
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $locality = $_POST['locality'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Azure SQL Database connection parameters
    $serverName = "tcp:gymserver.database.windows.net,1433";
    $connectionOptions = array(
        "Database" => "gymdatabase",
        "Uid" => "thomas",
        "PWD" => "Adiadarsh@123"
    );

    // Establish the connection to Azure SQL Database
    try {
        $conn = sqlsrv_connect($serverName, $connectionOptions);

        if ($conn === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        // Insert data into the Users table
        $sql = "INSERT INTO Users (name, age, gender, locality, email, phone) 
                VALUES (?, ?, ?, ?, ?, ?)";

        $params = array($name, $age, $gender, $locality, $email, $phone);

        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        } else {
            // Redirect to greeting.php after successful submission
            header("Location: greeting.php?name=" . urlencode($name));
            exit();
        }

        // Close the connection
        sqlsrv_close($conn);

    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

</body>
</html>
