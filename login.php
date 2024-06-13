<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $details = $_POST["details"];
    
    // Validate form fields
    // You can perform additional validation here
    
    // Connect to your database
    $conn = new mysqli("localhost", "root", "", "db_test");
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Prepare SQL statement to insert data
    $sql = "INSERT INTO user_details (fname, lname, email, phone, details) VALUES ('$fname', '$lname', '$email', '$phone', '$details')";
    
    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Close connection
    $conn->close();
}
?>