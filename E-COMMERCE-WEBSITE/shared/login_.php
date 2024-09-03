<?php
session_start();
$_SESSION['login_status']=false;
// $conn=new mysqli ("localhost","root","","acme", 3306);
include "sqlconnection.php";

$sql_result=mysqli_query($conn, "select * from user where user_name='$_POST[username]' and password='$_POST[password]' and
active_status=1");


// print_r($sql_result);

if($sql_result->num_rows==0){
echo "<h1>Invalid Username or Password.. Try again</h1><br>";
    sleep(1.2); 
die;
}
echo "<h1>Login Success!</h1><br>";
$dbrow=mysqli_fetch_assoc($sql_result);


// print_r($dbrow);

$_SESSION["login_status"]=true;
$_SESSION['user_id']=$dbrow['user_ID'];
$_SESSION['user_name']=$dbrow['user_name'];
$_SESSION['user_type']=$dbrow['user_type'];

if (isset($_SESSION['user_name'])) {
    echo "<h1>Hello {$_SESSION['user_name']}</h1>";
} else {
    echo "User name is not set.";
}

if($dbrow["user_type"]=="Vendor"){
    header("location:../Vendor/home.php");
}
if($dbrow["user_type"]=="Customer"){
    header("location:../Customer/home.php");
}
?>




