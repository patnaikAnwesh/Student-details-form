<?php
$insert = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name'])) {
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if (!$con) {
        die("Connection to the database failed due to " . mysqli_connect_error());
    }

    // Collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $description = $_POST['description']; // Ensure this matches the form input name

    // Prepare SQL query
    $sql = "INSERT INTO collection.collection (name, age, gender, email, phone, description, dt) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$description', current_timestamp());";

    // Execute the query
    if ($con->query($sql) === true) {
        $insert = true; // Set insert flag to true upon successful insertion
    } else {
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to KIIT University</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="kiit.jpg" alt="KIIT Bhubaneswar">
    <div class="container">
        <h1>Welcome to KIIT University</h1>
        <p>Enter your details</p>
        <?php
        if ($insert) {
            echo "<p class='submitmsg'>Thanks for submitting your form.</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="number" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="tel" name="phone" id="phone" placeholder="Enter your phone number">
            <textarea name="description" id="description" cols="20" rows="5" placeholder="Enter any other information here"></textarea>
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
    
    <script src="index.js"></script>
</body>
</html>

