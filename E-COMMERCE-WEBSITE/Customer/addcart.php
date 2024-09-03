<?php
session_start();


$pid= $_GET["pid"];

echo "pid == $pid";

include "../shared/sqlconnection.php";
$status= mysqli_query($conn,"insert into cart(user_id,pid) values($_SESSION[user_id] , $pid)");
if($status){
    echo "Successfully added to cart";
    header("location:home.php");
}


?>