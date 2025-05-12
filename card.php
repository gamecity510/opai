<?php
session_start(); 
if (isset($_SESSION['card'])){
    $servername = "localhost";
$username = "opaiir_root";
$password = "dEJ=aspo+kgG";
$dbname = "opaiir_data";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$searchId = $_SESSION['card']; 

$stmt = $conn->prepare("SELECT `card`, `price` FROM `store_card` WHERE `id` = ?");
$stmt->bind_param("i", $searchId);
$stmt->execute();

$result = $stmt->get_result();
$cards = ''; 
 $price = '';
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $cards = $row['card'];
    $price = $row['price'];
} 

$stmt->close();
$conn->close();
}else{
  $test = 1;

}
?>

<!-- نمایش کارت -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet" type="text/css" />
    <title>سبد خرید </title>
    <style>
     *{
          font-family: Vazirmatn, sans-serif;
    }
         body{
    background-color: #000000;
    padding: 0px;
    margin: 0px;
  
  }
 .navder{
    width: auto;
    height: 67px;
    background-color: #26c93c;
   display: flex;

}
#login{
 margin-left: 20px;
 padding-top: 6px;
 height: 60px;
 
 
}

.nav{
    background-color:  #ffffff;
    color: #fff;
    font-size: 14px;
 width: 100px;
 height: 40px;
    border-radius: 50px;
    position: relative;
    display: inline-block;
    transition: all .3s;
    margin-top: 5px;
    border-style: hidden;
    color: #000000;
}
.abt{ 
    color:  #ffffff;
    font-size: 30px;
}
a{
    text-decoration :none;
}
#about{
    padding-top: 14px;
    width: 200px;
}
.blg{
    color:  #ffffff;
    font-size: 30px;
}
.Blog{
    padding-top: 14px;
    width: 200px;
}
.cnt{
    color:  #ffffff;
    font-size: 30px;
}
.ctu{
    padding-top: 14px;
    width: 200px;
}
.crw{
    color: #ffffff;
    font-size: 30px;
}
.menu{
    display: none;
   
   
    background-color: #26c93c ;
}
.nav_menu{
    
    background-color: #26c93c ;
    border-style: none;
    margin-left: auto;
    
}

.menu {
   display: none; 
   opacity: 0; 
   transition: opacity 0.5s ease, transform 0.5s ease; 
   transform: translateY(-20px); 
 }
.menu.show {
     display: block; 
    opacity: 1; 
     transform: translateY(0); 
  
     width:100%;
 }
.creat{
    padding-top: 14px;
    width: 100%;
    border-style: solid;
    border-width: 5px;
    border-color: #084e11;
     text-align: center;
      margin-left: auto;
   margin-right: auto;
   border-left: transparent;
    border-right: transparent;
    
}
body {
    background-color: #fff;
    color: #333;
}
.toggle{
    background-color: #ffffff;
    border-radius: 16px;
    display: flex;
    height: 50px;
    margin-top: 10px;
    width: 100px;
    padding-left: 12px;
    margin-left: 100px;
    padding-top: 15px;
}
.btn_drk{
background-color: #000000;
color:white;
border-radius: 50px;
height: 40px;


}
.btn_lght{
background-color: white;
color: #000000;
border-radius: 50px;
height: 40px;

}
  .product-container {
            display: flex;
            justify-content: center;
            margin-top: 30px;
            flex-wrap: wrap;
        }
        .product {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 15px;
            padding: 20px;
            width: 250px;
            text-align: center;
        }
        .product img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .product h3 {
            font-size: 1.5em;
            margin-top: 10px;
        }
        .product p {
            color: #777;
            margin: 10px 0;
        }
        .product .price {
            font-size: 1.2em;
            color: #d9534f;
            font-weight: bold;
 }
 .alert{
     color:white;
          text-shadow: 2px 1px red;
     text-align:center;
     margin-top:200px;
 }
 .show_price{
         position: fixed;
         bottom: 0;
         left: 0;
         width: 100%;
         background-color: #26c93c ;
         width:100%;

       
         font-size:80px;
       
         
 }
 .end{
       background-color: red ;
       width:58.95%;
       height: 154px;
       border-style:solid;
       border-width:0px;
       color:white;
       margin-left:100px;
         font-size:80px;
       
 }
    </style>
</head>
<body>
       
        <div class="navder" id="drk">
                   
          
         <?php
  
          if (isset($_SESSION['user'])) :{
           echo '<div class="psh">
            <a href="https://moshaverehopai.ir/accounts.php">
                <svg id="acn" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                </svg>
                    <span>' .$_SESSION["user"] . '</span>
            </a>
          </div>';
          }else:{
             echo ' <div id="login">
              <a href="https://moshaverehopai.ir/signin.php">  <button class="nav">ورود/ثبت نام</button></a>
         </div>';
          } 
         
        endif; ?>
         
            
            <button class="nav_menu"  onclick="main()">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                  </svg>
            </button>
          </div>
          <div class="menu" id="menu">
                
            <div class="creat">
                <a class="crw" href="https://moshaverehopai.ir/">خانه</a>
               
               </div>
              <div class="creat">
                <a class="crw" href="https://moshaverehopai.ir/indexai.html">مشاوره</a>
                
              </div>
              <div class="creat">
                <a class="crw" href="#section2">تماس با ما</a>
              </div>
              <div class="creat">
                <a class="crw" href="https://moshaverehopai.ir/store.php">محصولات</a>
              </div>
              </div>



              
<div class="card-container">
    <?php 
    if (isset($_SESSION['card'])) {
        echo "<div class=\"alert\"><h1>محصولی وجود ندارد</h1></div>";
       
    } else {
       
        echo htmlspecialchars_decode($cards, ENT_QUOTES);
         
    }
    ?>
</div>
<div class="show_price"><?php


    if (isset($_SESSION['card'])) {
        echo "محصولی را شما انتخاب نکرده اید!!!";
       
    } else {
       
        echo "<form method=\"post\"> قیمت کل فاکتور:$price <button type=\"submit\" class=\"end\">   تسویه حساب</button></form>"; 
        
         
    }


?></div>


              <script>
        
            function main() {
           
            var menu = document.getElementById('menu');
        
            if (menu.classList.contains('show')) {
                menu.classList.remove('show');
                
                setTimeout(() => {
                    menu.style.display = 'none'; 
                    
                }, 500); 
            } else {
                menu.style.display = 'block'; 
               
                setTimeout(() => {
                    menu.classList.add('show');
                    
                
                }, 10); 
            }

        }
              </script>
</body>
</html>