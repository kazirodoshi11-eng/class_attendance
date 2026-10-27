<?php
session_start();
if(!isset($_SESSION['loggedin'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Attendance System - Home</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f0f2f5;
            text-align: center;
            padding-top: 100px;
        }
        h1 {
            color: #333;
        }
        a {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            margin: 10px;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #0056b3;
        }
        .logout {
            background-color: #dc3545;
        }
        .logout:hover {
            background-color: #a71d2a;
        }
    </style>
</head>
<body>
    <h1>Welcome, Admin 👋</h1>
    <p>Select an option below:</p>
    
    <a href="add_student.php">➕ Add Student</a>
    <a href="mark_attendance.php">📝 Mark Attendance</a>
    <a href="view_attendance.php">📊 View Attendance</a>
    <a href="logout.php" class="logout">🚪 Logout</a>
</body>
</html>
