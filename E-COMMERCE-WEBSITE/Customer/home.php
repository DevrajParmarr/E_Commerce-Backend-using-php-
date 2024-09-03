<?php

session_start();
if(!isset($_SESSION["login_status"])){
    echo "Login in skipped";
    die;
}

if($_SESSION["login_status"]==false){
    echo "Unauthorised Attempt";
    die;
}

// $_SESSION["user_type"]!="Custumer"{
//     echo "Forbidden access";
//     die;
// }


include "menu.html";
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h3>We Welcome our Custumer</h3>
    <h2>Explore all product and .....</h2>
</body>
</html>


<?php
// session_start();
include "../shared/sqlconnection.php";
$conn=new mysqli ("localhost", "root","", "acme", 3306);

$sql_result=mysqli_query($conn, "select * from product ");
//Loop sql_result and Fetch 1 dbrow at atime till the dbrow is NOT empty while($dbrow=mysqli_fetch_assoc($sql_result)){
// print_r($dbrow);
// echo "<br>";



while($dbrow=mysqli_fetch_assoc($sql_result)){
    echo "<div class= 'pdt-container'>
      <div class='name'>$dbrow[name]</div>
      <div class='price'>$dbrow[price]</div>
      <img src='$dbrow[impath]'>
      <div class='detail'>$dbrow[detail]</div>
     
        <div class='button'>
        <a href='addcart.php?pid=$dbrow[pid]'>Add to Cart  </a></div>
    
   </div>";
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

.button{
  position:relative;
  display:flex;
  margin:3px;
  justify-content: center;
}

.button a{
  color:white;
  font-family:Helvetica, sans-serif;
  font-weight:bold;
  font-size:22px;
  text-align: center;
  text-decoration:none;
  background-color:#FFA12B;
  display:block;
  position:relative;
  padding:2px 4px;
  
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
  text-shadow: 0px 1px 0px #000;
  filter: dropshadow(color=#000, offx=0px, offy=1px);
  
  -webkit-box-shadow:inset 0 1px 0 #FFE5C4, 0 10px 0 #915100;
  -moz-box-shadow:inset 0 1px 0 #FFE5C4, 0 10px 0 #915100;
  box-shadow:inset 0 1px 0 #FFE5C4, 0 10px 0 #915100;
  
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
}

.button a:active{
  top:10px;
  background-color:#F78900;
  
  -webkit-box-shadow:inset 0 1px 0 #FFE5C4, inset 0 -3px 0 #915100;
  -moz-box-shadow:inset 0 1px 0 #FFE5C4, inset 0 -3pxpx 0 #915100;
  box-shadow:inset 0 1px 0 #FFE5C4, inset 0 -3px 0 #915100;
}

.button:after{
  content:"";
  height:100%;
  width:100%;
  padding:4px;
  position: absolute;
  bottom:-15px;
  left:-4px;
  z-index:-1;
  background-color:#2B1800;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
}

.pdt-container{
background-color:rgb(240, 162, 162);
display:inline-block;
 margin:10px;
padding:10px;
width:310px;
border: 2px solid rgb(124, 133, 107);
border-radius: 12px;
/* height:400px; */
margin:15px;
padding:10px
}
.pdt-container:hover{
    box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
}
img{
    width: 100%;
    height:200px;
    transition: transform .2s;
}
img:hover{
    border-radius:20px;
    transform: scale(1.03);

}

.name{
font-size: 24px;
font-weight: bold;
color: blueviolet;
}
.price{
    font-size: 17px;
    font-weight:bold;
    
}
.detail{
    font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
    background-color: antiquewhite;
    margin-top:6px;
    padding:5px;
    overflow-x: auto;
}

.price::before{
content:" Rs";
font-size: 23px;
margin:4px;
border-radius: 10px;
}



    </style>
</head>
<body>
    
</body>
</html>