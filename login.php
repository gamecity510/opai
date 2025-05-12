<?php


session_start();

$error_pass = '<!DOCTYPE html>
<html>
<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>Swal.fire({
        title: "اخطار",
        text: "رمز اشتباه است",
        icon: "error"
      });</script>
</body>
</html>';

$error_user = '<!DOCTYPE html>
<html>
<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>Swal.fire({
        title: "اخطار",
        text: "این کاربر وجود ندارد",
        icon: "error"
      });</script>
</body>
</html>';



$servername = "localhost";
$db_username = "opaiir_root";
$db_password = "dEJ=aspo+kgG";
$dbname = "opaiir_data";
$conn = new mysqli($servername, $db_username, $db_password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['login'])) {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $pass = $_POST['password'];

        
        $sql = "SELECT password FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($db_password);
            $stmt->fetch();

            
            if (md5($pass) === $db_password) {
                $_SESSION['user'] = $username; 
                $_SESSION['test'] = "this is one of the test";
                
                header("Location: https://www.moshaverehopai.ir/true.html"); 
                
            } else {
                echo "$error_pass";
            }
        } else {
            echo "$error_user";
        }

        $stmt->close();
    } 
}

$conn->close();
?>




<!DOCTYPE html>
<html>
<head>
    <title>ورود</title>
    <head>
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet" type="text/css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه ورود</title>
    <link rel="stylesheet" href="slogin.css">
    <style>
        
* {
    font-family: Vazirmatn, sans-serif;
}

body {
    background-color: #fff;
    color: #333;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}


.login-container {
    background-color: #f4f4f4;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.login-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}


h2 {
    text-align: center;
    color: #4CAF50;
}


.input-group {
    display: flex;
    flex-direction: column;
}

.input-group label {
    font-size: 14px;
    color: #555;
}

.input-group input {
    padding: 10px;
    font-size: 16px;
    border: 2px solid #ddd;
    border-radius: 5px;
    margin-top: 5px;
}


.login-btn {
    padding: 12px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.login-btn:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>
   
    <div class="login-container">
    <form method="post" class="login-form">
         <h2>فرم ورود</h2>
         <div class="input-group">
             <label for="username">نام کاربری</label>
        <input  id="username" type="text" name="username" placeholder="نام کاربری" required>
         </div>
        <div class="input-group">
            <label for="password">رمز عبور</label>
        <input  id="password" type="password" name="password" placeholder="رمز عبور" required>
         </div>
           <div class="cf-turnstile" data-sitekey="0x4AAAAAAA7AKmOitni4BPJk"></div>
        <input class="login-btn" type="submit" name="login" value="ورود">
    </form>
     </div>
 <script
  src="https://challenges.cloudflare.com/turnstile/v0/api.js?onload=onloadTurnstileCallback"
  defer
></script>
</body>
</html>
