<?php
session_start();
if(!isset($_SESSION['loggedin'])){
    header("Location: login.php");
    exit();
}
?>

<?php
// Database connection
$mysqli = new mysqli("localhost", "root", "", "attendance_system");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

echo "<h3 style='color:green;'>✅ Database Connected Successfully!</h3>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Attendance</title>
    <style>
        body {
            font-family: Arial;
            margin: 40px;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #666;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #3b82f6;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .header {
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h2 class="header">📋 Attendance Report</h2>

<table>
    <tr>
        <th>Date</th>
        <th>Student Name</th>
        <th>Reg No</th>
        <th>Status</th>
    </tr>

<?php
$query = "
    SELECT a.att_date, s.name, s.reg_no, a.status
    FROM attendance a
    JOIN students s ON a.student_id = s.id
    ORDER BY a.att_date DESC, s.name ASC
";
$result = $mysqli->query($query);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['att_date']}</td>
                <td>{$row['name']}</td>
                <td>{$row['reg_no']}</td>
                <td>{$row['status']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No attendance records found.</td></tr>";
}

$mysqli->close();
?>
</table>

</body>
</html>
