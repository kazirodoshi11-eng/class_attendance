<?php
session_start();
if(!isset($_SESSION['loggedin'])){
    header("Location: login.php");
    exit();
}
?>

<?php
include 'db.php'; // Database connection

// Check if form is submitted
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $reg_no = $_POST['reg_no'];

    // Insert query
    $sql = "INSERT INTO students (name, reg_no) VALUES ('$name', '$reg_no')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>✅ Student added successfully!</p>";
    } else {
        echo "<p style='color:red;'>❌ Error: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body style="font-family:Arial; margin:40px;">
    <h2>📘 Add New Student</h2>
    <form method="POST" action="">
        <label>Student Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Registration No:</label><br>
        <input type="text" name="reg_no" required><br><br>

        <input type="submit" name="submit" value="Add Student">
    </form>
</body>
</html>
