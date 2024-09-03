<?php

session_start();

// print_r($_POST);
// echo "<br>";
// print_r($_FILES);

$source_path=$_FILES["pdtimg"]["tmp_name"];
$file_name="../shared/images/".$_FILES["pdtimg"]['name'];

// <br>
// echo "temp file is in $source_path";
// <br>
// echo "File name= $file_name";

move_uploaded_file($source_path,$file_name);

include "../shared/sqlconnection.php";
$name=$_POST["name"];
$price=$_POST["price"];
$detail=$_POST["detail"];

$query="insert into product(name,price,detail,impath,owner) values('$name', $price , '$detail' , '$file_name' ,$_SESSION[user_id])";

// echo "$query";


if (mysqli_query($conn, $query)) {
    sleep(2);
      echo "<h1>Successful Insertion</h1>";
      header('location:View.php');
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>


<!-- mysqli_query($conn,$query ); -->


<!-- <form action="view.php" method="get">
    <button type="submit">View Product</button>
</form> -->
