<?php
// Include database connection file
require_once "config.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare and execute SQL statement
$stmt = $conn->prepare("SELECT UserType FROM users WHERE Email=? AND Password=?");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

// Check if user exists and retrieve user type
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $userType = $row['UserType'];

    // Start session and store user information
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['userType'] = $userType;

    // Redirect to appropriate dashboard
    if ($userType == 'regular') {
        header("Location: regular_dashboard.php");
    } elseif ($userType == 'instructor') {
        header("Location: instructor_dashboard.php");
    }
    exit();
} else {
    // User not found, display error message
    echo "<script>alert('Wrong Email or Password, Please Verify Credentials');</script>";
    echo "<script>window.location.href = 'login.html';</script>";
}

$stmt->close();
$conn->close();
?>
