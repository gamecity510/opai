<?php
session_start();
$set_ip = '<!DOCTYPE html>
<html>
<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>Swal.fire({
        title: "محصول ذخیره شد",
        text: "جهت تسویه حساب اقدام نمایید",
        icon: "success"
      });</script>
</body>
</html>';
error_reporting(E_ALL);
ini_set('display_errors', 1);

$user_name = $_SESSION['user']; 
if ($user_name == "admin_one_sp") {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
        if (isset($_POST['create'])) {
            $title = $_POST['title'];
            $dlt = $_POST['dlt'];
            $price = $_POST['price'];
            $id = $_POST['id']; 

            $image = "12345.jpg";
            $divContent = "<div id=\"$id\" class=\"product\">
                <img src=\"$image\" alt=\"$title\">
                <h3>$title</h3>
                <p>$dlt</p>
                <p class=\"price\">$price</p>
             <input type=\"submit\" name=\"$id\" value=\"خرید\">

            </div>";
            
         $servername = "localhost";
         $username = "opaiir_root"; 
         $password = "dEJ=aspo+kgG"; 
          $dbname = "opaiir_data";
         $conn = new mysqli($servername, $username, $password, $dbname);
          $sql = "INSERT INTO `store_card`(`card`, `id`, `price`) VALUES (' $divContent','$id','$price')";
         if ($conn->query($sql) === TRUE) {
            $conn->close();
        
            } 
        } 
        
   
    if (isset($_POST['delete'])) {


// اعتبارسنجی و پاکسازی ورودی
$id = filter_var($_POST['id'], FILTER_VALIDATE_INT);

// تنظیمات اتصال به پایگاه داده
$servername = "localhost";
$username = "opaiir_root"; 
$password = "dEJ=aspo+kgG"; 
$dbname = "opaiir_data";

// ایجاد اتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// حذف رکورد با استفاده از prepared statement
$stmt = $conn->prepare("DELETE FROM store_card WHERE id = ?");
$stmt->bind_param("i", $id);

// اجرا و نمایش نتیجه با SweetAlert
if ($stmt->execute()) {
    $message = ($stmt->affected_rows > 0) 
        ? ["title" => "پیام", "text" => "محصول حذف شد", "icon" => "success"]
        : ["title" => "اخطار", "text" => "محصول یافت نشد", "icon" => "warning"];
} else {
    $message = ["title" => "خطا", "text" => "مشکل در حذف محصول", "icon" => "error"];
}

// نمایش پیام
echo "<!DOCTYPE html>
<html>
<body>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        Swal.fire({
            title: '{$message['title']}',
            text: '{$message['text']}', 
            icon: '{$message['icon']}'
        });
    </script>
</body>
</html>";

// بستن اتصالات
$stmt->close();
$conn->close();


}

       if (isset($_POST['ip'])) {
           $servername = "localhost";
$username = "opaiir_root"; 
$password = "dEJ=aspo+kgG"; 
$dbname = "opaiir_data"; 

$conn = new mysqli($servername, $username, $password, $dbname);
    $ip_name = trim($_POST['ipname']);
    $sql_insert = "INSERT INTO denied_ips (ip_address) VALUES ('$ip_name')";

    if ($conn->query($sql_insert) === TRUE) {
        echo "$set_ip";
        $conn->close();
        
    } else {
        echo "Error adding IP: " . $conn->error;
    }
}
if (isset($_POST['member'])) {
    

$servername = "localhost";
$username = "opaiir_root"; 
$password = "dEJ=aspo+kgG"; 
$dbname = "opaiir_data"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username FROM users";
$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->bind_result($user);

$user_list = []; 

while ($stmt->fetch()) {
    $user_list[] = htmlspecialchars($user);
}

$stmt->close();
$conn->close();


$user_list_string = implode(", ", $user_list); 


echo  '<!DOCTYPE html>
<html>
<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: "لیست کاربران",
            text: "' . $user_list_string . '", 
            icon: "info"
        });
    </script>
</body>
</html>';

    
    
    
}

        
    }
} else {
    header("Location: https://moshaverehopai.ir/");
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>کنترل پنل مدیریت</title>
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet" type="text/css" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        * {
            font-family: Vazirmatn, sans-serif;
        }
        .mnu {
            background-color: chartreuse;
            width: 20%;
            height: 1000px;
            margin-left: auto;
            position: fixed;
        }
        .mnu_mini {
            display: flex;
            background-color: rgb(65, 131, 0);
            width: 90%;
            height: 50px;
            margin-top: 60px;
            text-align: center;
        }
        .mn_btn {
            background-color: red;
            width: 60px;
            height: 34px;
            border-radius: 5px;
            border-style: solid;
            border-color: red;
            color: white;
            margin-top: 10px;
            margin-left: 10px;
        }
        .txt_ttl {
            margin-left: 30px;
            margin-bottom: 5px;
        }
        iframe {
            width: 80%;
            height: 1000px;
            border: none; 
            float:right;
        }
        .mnu_mini_cr {
            display: block;
            background-color: rgb(65, 131, 0);
            width: 90%;
            height: auto;
            margin-top: 60px;
            text-align: center;
        }
        .inp_cr {
            width: 60px;
            height: 20px;
            margin-left: 10px;
        }
        .txt_ttl_one {
           margin-left: 0px; 
           margin-bottom: 5px; 
        }
        .inp_cr {
           margin-top: 30px; 
           display:block; 
      
        }
      
    </style>
</head>
<body>
<form method="post">
    <div class="mnu">
        <h2>دسترسی ها:</h2>

        <div class="mnu_mini_cr ">
           <h3 class="txt_ttl_one">ایجاد محصول جدید </h3>
           <input class="inp_cr" type="text" name="title" placeholder="عنوان" required>
           <input class="inp_cr" type="text" name="dlt" placeholder="توضیحات" required >
           <input class="inp_cr" type="text" name="price" placeholder="قیمت" required>
           <input class="inp_cr" type="text" name="id" placeholder="ایدی محصول" required>
           <button type="submit" name ="create" class="mn_btn">ایجاد</button>
       </div>
    </form>

    <form method="post">
       <div class="mnu_mini">
           <h3 class="txt_ttl">حذف محصول</h3>
           <input class="inp_cr" type="text" name="id" placeholder="ایدی محصول" required>
           <button type="submit" name="delete" class="mn_btn">حذف</button>
       </div>
    </form>
<form method="post">
    <div class="mnu_mini">
       <h3 class="txt_ttl">بلاک کردن ایپی</h3>
           <input class="inp_cr" type="text" name="ipname" placeholder="ایپی" required>
       <button type="submit" name="ip" class="mn_btn">شروع</button>
   </div>
</form>
<form method="post">
   <div class="mnu_mini">
       <h3 class="txt_ttl">کاربران</h3>
       <button type="submit" name="member" class="mn_btn">دیدن</button>
   </div>
</form>
   </div>

   <div id="live-site">
       <iframe src="https://moshaverehopai.ir/store.php"></iframe> 
   </div>

</body>
</html>
