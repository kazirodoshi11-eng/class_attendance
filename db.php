<?php
// Database connection setup
$servername = "localhost";
$username = "root";
$password = ""; // XAMPP এ সাধারণত পাসওয়ার্ড থাকে না
$dbname = "attendance_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "✅ Database Connected Successfully!";
}
?>
