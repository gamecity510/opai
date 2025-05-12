<?php
session_start(); 

// Database connection details
$servername = "localhost";
$username = "opaiir_root";
$password = "dEJ=aspo+kgG";
$dbname = "opaiir_data";

// Establishing database connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetching user details from session and database
$user_name = $_SESSION['user']; 
$sql = "SELECT email FROM users WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_name);
$stmt->execute();
$stmt->bind_result($email);
$stmt->fetch();
$stmt->close();

// Fetching phone number
$sql_one = "SELECT phone FROM users WHERE username=?";
$stmt_one = $conn->prepare($sql_one);
$stmt_one->bind_param("s", $user_name);
$stmt_one->execute();
$stmt_one->bind_result($num);
$stmt_one->fetch();
$stmt_one->close();

// Closing database connection
$conn->close();

// Handling POST request for logging out
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_destroy();
    header("Location: https://moshaverehopai.ir/logout.html"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حساب کاربری</title>
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet" type="text/css" />
    <style>
        * {
            font-family: Vazirmatn, sans-serif;
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            display: block;
            width: 400px;
            height: 500px;
            background-color: #00ea1f;
            border-radius: 15px;
            border: 4px solid green;
            text-align: center;
            margin: 200px auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            background-color: #00ea1f;
            padding: 10px;
        }

        .header a {
            text-decoration: none;
            font-size: 25px;
            color: white;
        }

        .profile-icon {
            margin: 20px 0;
        }

        .profile-info {
            text-align: center;
        }

        .profile-info h2 {
            margin: 10px 0;
        }

        .btn-sub {
            background-color: red;
            border-radius: 5px;
            width: 100px;
            height: 30px;
            border: none;
            color: white;
            cursor: pointer;
        }

        .btn-sub:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>

<div class="header">
    <a href="https://moshaverehopai.ir/">برگشت</a>
</div>

<div class="container">
    <div class="profile-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
            <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5"/>
            <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z"/>
        </svg>
    </div>

    <div class="profile-info">
        <h2>نام کاربری : <?php echo htmlspecialchars($_SESSION['user']); ?></h2>
        <h2><?php echo "ایمیل کاربر: " . $email; ?></h2>
        <h2>شماره تلفن کاربر: <?php echo $num; ?></h2>
    </div>

    <form method="post">
        <input class="btn-sub" type="submit" name="myButton" value="خروج از اکانت" />
    </form>
</div>

</body>
</html>
