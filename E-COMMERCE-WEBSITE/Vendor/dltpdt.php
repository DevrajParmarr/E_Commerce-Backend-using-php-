<?php

$pid=$_GET["cartid"];
include "../shared/sqlconnection.php";

$status=mysqli_query($conn,"delete from product where pid=$pid");

if($status){
    header('location:View.php');
}else{
    echo "sql error ";
}

?>