<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ✅ Hardcoded login info
    if ($username == "admin" && $password == "12345") {
        $_SESSION['loggedin'] = true;
        header("Location: index.php");
        exit();
    } else {
        $error = "❌ Invalid Username or Password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 300px;
            text-align: center;
        }
        input {
            width: 90%;
            padding: 8px;
            margin: 10px 0;
        }
        button {
            background: #28a745;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #218838;
        }
    </style>
</head>
<body>

<form method="post">
    <h2>🔐 Admin Login</h2>
    <input type="text" name="username" placeholder="Enter Username" required><br>
    <input type="password" name="password" placeholder="Enter Password" required><br>
    <button type="submit">Login</button>
    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
</form>

</body>
</html>
