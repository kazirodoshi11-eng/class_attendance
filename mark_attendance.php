<?php
session_start();
if(!isset($_SESSION['loggedin'])){
    header("Location: login.php");
    exit();
}
?>

<?php
include 'db.php';

// Fetch all students
$students = $conn->query("SELECT * FROM students ORDER BY id ASC");

// When form submitted
if (isset($_POST['submit'])) {
    $att_date = date('Y-m-d'); // today's date

    foreach ($_POST['attendance'] as $student_id => $status) {
        $sql = "INSERT INTO attendance (student_id, att_date, status)
                VALUES ('$student_id', '$att_date', '$status')
                ON DUPLICATE KEY UPDATE status='$status'";
        $conn->query($sql);
    }

    echo "<p style='color:green;'>✅ Attendance recorded for $att_date</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mark Attendance</title>
</head>
<body style="font-family:Arial; margin:40px;">
    <h2>🗓️ Mark Attendance</h2>
    <form method="POST" action="">
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>Reg No</th>
                <th>Status</th>
            </tr>

            <?php while ($row = $students->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['reg_no']; ?></td>
                    <td>
                        <input type="radio" name="attendance[<?php echo $row['id']; ?>]" value="Present" required> Present
                        <input type="radio" name="attendance[<?php echo $row['id']; ?>]" value="Absent"> Absent
                    </td>
                </tr>
            <?php } ?>
        </table><br>

        <input type="submit" name="submit" value="Save Attendance">
    </form>
</body>
</html>
