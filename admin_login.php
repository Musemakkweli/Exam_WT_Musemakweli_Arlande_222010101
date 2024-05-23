<?php

    
/**
*Created by: MUSEMAKWELI Belyse Rossa Arlande 
* Registration Number: 222010101 
*School Department: Year 2 in BIT (Business Information Technology)
*Project: Online Virtual Reality Courses Platform
 
 */

// Include database connection file
require_once "config.php";


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$email = $_POST['email'];
$password = $_POST['password'];


$stmt = $conn->prepare("SELECT name FROM admin WHERE email=? AND password=?");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    session_start();
    $_SESSION['email'] = $email; 
    header("Location: admin_home.php"); 
    exit();
} else {
 
    echo "<script>alert('Wrong Email or Password, Please Verify Credentials');</script>";
    echo "<script>window.location.href = 'admin_login.html';</script>";
}


$stmt->close();
$conn->close();
?>