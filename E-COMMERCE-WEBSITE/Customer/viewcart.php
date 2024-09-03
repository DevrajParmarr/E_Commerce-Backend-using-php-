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
    
    <h3>Here is your Cart:</h3>
</body>
</html>


<?php
// session_start();
include "../shared/sqlconnection.php";
$conn=new mysqli ("localhost", "root","", "acme", 3306);

$sql_result=mysqli_query($conn, "select * from cart join product on cart.pid=product.pid where cart.user_id=$_SESSION[user_id] ");
//Loop sql_result and Fetch 1 dbrow at atime till the dbrow is NOT empty while($dbrow=mysqli_fetch_assoc($sql_result)){
// print_r($dbrow);
// echo "<br>";


$total=0;
while($dbrow=mysqli_fetch_assoc($sql_result)){
    $total+=$dbrow['price'];

    echo "<div class= 'pdt-container'>
      <div class='name'>$dbrow[name]</div>
      <div class='price'>$dbrow[price]</div>
      <img src='$dbrow[impath]'>
      <div class='detail'>$dbrow[detail]</div>
     <a href='dltcart.php?cartid=$dbrow[cartid]'>
        <button class='btn btn-danger w-100'>Remove from Cart</button>
    </a>
   </div>";
}
 
echo "
    <div class=' display-2'>
         <a href='place.php'>
        <button class='place'>Place Order</button>  </a>
         <span>Totol Price:RS $total</span>
    </div> 
     ";
    



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

.place{
    border:2px solid rgba(112,111,211, 0);
    background-color:rgb(252, 5, 5);
    padding-left: 20px;
    padding-right: 20px;
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

?>