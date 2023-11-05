<?php
// Database connection
$conn = new mysqli('localhost', 'your_username', 'your_password', 'your_database');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input
$username = $_POST['username'];
$password = $_POST['password'];

// Check user credentials
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($query);

if ($result->num_rows == 1) {
    // User is authenticated, redirect to a welcome page
    header('Location: welcome.html');
} else {
    // Authentication failed, show an error message
    echo "Login failed. Please check your username and password.";
}

$conn->close();
?>
