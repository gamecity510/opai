<?php
session_start(); 
$servername = "localhost";
$username = "opaiir_root";
$password = "dEJ=aspo+kgG";
$dbname = "opaiir_data";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT `card` FROM `store_card`";
$result = $conn->query($sql);
$cards = array();
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        $cards[] = $row['card'];
    }
} 
  
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $name = key($_POST);
    $_SESSION['card'] = $name; 
}  

?>
<!DOCTYPE html>
<!-- saved from url=(0047)https://moshaverehopai.ir/Untitled-1%20(1).html -->
<html ><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet" type="text/css" />
    <title>هوش مصنوعی مشاوره</title>
    <style>
    *{
          font-family: Vazirmatn, sans-serif;
    }
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            direction: rtl;
        }
        header {
            background-color: #1c9c2d;
            color: white;
            text-align: center;
            padding: 20px;
        }
        nav {
            background-color: #26c93c;
            overflow: hidden;
        }
        nav a {
            float: right;
            padding: 14px 20px;
            color: white;
            text-decoration: none;
            text-align: center;
            
        }
        nav a:hover {
            background-color: #ddd;
            color: black;
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
        footer {
            background-color: #26c93c;
            color: white;
            text-align: center;
            padding: 5px;
            position: fixed;
            width: 100%;
            bottom: 0;
 }
.abt_site{
    background-color: white;
    width: auto;
    height: 300px;
    margin-top: 200px;
    
}
.back_one{
    font-size: 30px;
    text-align: center;
    padding-top: 30px;
    background-color: rgb(226, 226, 226);
    
}
.back_two{
    font-size:30px ;
    padding-top: 100px;
}
.svg_fn{
    width: auto;
    display: flex;
    color: #00ea1f;
}
.bi-twitter-x{
    margin-left: 20px;
}
.bi-telegram{
    margin-left: 20px;
}
.bi-instagram{
    margin-left: 20px;
}
.tex_three{
   padding-bottom: 30px;
}


.ai_logo{
    width: 20%;
}
.btn_cn{
    background-color: #26c93c;
    color: white;
    border-radius: 15px;
    width: 500px;
    height: 200px;
    font-size: 40px;    
    margin-top: 100px;
    box-shadow: 5px -8px 5px blue
}
a{
    text-decoration :none;
}
.crw{
    color: #ffffff;
    font-size: 30px;
    border-radius: 15px;
}
.cnt_div{
    text-align: center;
}
.bi-telephone-fill{
    margin-left: 100px;
}
.h3_op{
    margin-left: 100px;
}
.phone{
    display: flex;
    float: left;
   background-color:white;
}
.bi-phone-fill{
    margin-left: 30px;
}
.nav_menu{
    
    background-color: #26c93c ;
    border-style: none;
    margin-left: auto;
    
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
.nav:hover {
    background-color:  #a9fcad;
    box-shadow: 0 5px 15px black;
}
 #login{
 margin-left: 20px;
 padding-top: 6px;
 height: 60px;

 
 
}
.navder{
    width: 100%;
    height: 67px;
    background-color: #26c93c;
   display: flex;

  
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
    margin-top: 13px;
    border-style: hidden;
    color: #000000;
}
  input{
           background-color:red;
           border-style:solid;
           border-radius:5px;
                border-width:0px;
           color:white;
        }

.creat{
    width: 100%;
    border-style: solid;
    border-width: 5px;
   
    padding-top: 14px;
    text-align: center;
   margin-left: auto;
   margin-right: auto;

    border-color: #084e11;
    background-color: #26c93c;
    border-left:transparent;
    border-right:transparent;

}
#acn{
    display:block;
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

 .shopping{
    display: flex;
    margin-top: 10px;
    margin-left: 20px;
 }
.crw:hover{
    color: #333;
    background-color: white;
}


@media (max-width: 600px) {
    
   
    .phone{
        display: block;
        margin-right:40px;
    }
    .title{  
        font-size: 30px; 
       
         
        
        width: 100px;
       
    }
    .crw{
        font-size: 20px;
    } 
    .abt_site{
    height: 500px;
}
    }
    </style>
</head>
<body>

<header>
    <a href="https://moshaverehopai.ir/Untitled-1%20(1).html#logo"><img src="Logopit_1734509931721_prev_ui.png" alt="لوگو" width="200px"></a>

</header>
<div class="navder" id="drk">
    <div id="login">

    </div>
    
    <button class="nav_menu"  onclick="main()">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
          </svg>
    </button>
       <!--   <div class="shopping">
       <a href="https://moshaverehopai.ir/card.php"> <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
            <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9zM1 7v1h14V7zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5"/>
          </svg></a>
      </div> -->
    <div id="login">
         <?php if (isset($_SESSION['user'])) : ?>
      
               <div class="psh"><a href="https://moshaverehopai.ir/accounts.php"><svg id="acn" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16"><path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/> <span > <?php echo htmlspecialchars($_SESSION['user']); ?></span></a></div>
         <?php else : ?>
          <a href="https://moshaverehopai.ir/signin.php">  <button class="nav">ورود/ثبت نام</button></a>
         
         <?php endif; ?>
        </div>
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

<form   method="POST">
    <section id="products" class="product-container"><div id="one" class="product">
        <img src="12345.jpg" alt="مشاور ایرانی">
        <h3>مشاور ایرانی</h3>
        <p>جواب های این مشاور با توجه به افکار یک فرد ایرانی نوشته شده و  این محصول یک ربات متغییر نویسی شده است</p>
        <p class="price">60,000 تومان</p>
        <input type="submit" nmae="shop_card_one" value="خرید">
         </div>
   
      
      <?php   
      echo implode($cards);
      ?>
      </section>
</form>
<div class="abt_site" id="section2">
    <div id="drk" class="back_one"><p class="tex_three">ما سال ها برای بدست اوردن اعتماد شما تلاش کردیم</p>
    
    </div>
    
    
    
    
    
      
      <div class="phone">
        
       <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi-telephone-fill" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"></path>
    </svg>
     
          <h3 class="h3_op">+989337430391 : پشتیبانی اول</h3>
      
      
       <h3 class="h3_op">+989046824876 : پشتیبانی دوم</h3>

        
    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi-phone-fill" viewBox="0 0 16 16">
        <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-2.5a2 2 0 0 0-1.6.8L8 14.333 6.1 11.8a2 2 0 0 0-1.6-.8H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"></path>
        <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6m0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"></path>
      </svg>
       <h3 class="h3_op">moshavereh_op@ : ایدی کانال ما در بله</h3>
  
    
    
     
    
      
      </div>
    
    
      <script>

 
    
        function main() {
        var abt = document.getElementById('section2');
        var menu = document.getElementById('menu');
        abt.style.marginTop = '110px';
        if (menu.classList.contains('show')) {
            menu.classList.remove('show');
            abt.style.marginTop = '40px'; 
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
    

            
            
            
    
     
            var MyTag = document.getElementById('mam');
            if (MyTag) {
                MyTag.remove();
            }
        
    
     
            var MyTag = document.getElementById('mam');
            if (MyTag) {
                MyTag.remove();
            }
        
    
     
            var MyTag = document.getElementById('ded');
            if (MyTag) {
                MyTag.remove();
            }
        
    </script>


</body>
</html>