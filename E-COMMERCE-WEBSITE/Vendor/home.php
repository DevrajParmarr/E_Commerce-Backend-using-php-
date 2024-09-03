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

// if($_SESSION["user_type"]!="Vendor" ){
//     echo "You cannot access This page ";
//     echo "Forbidden access";
//     die;
// }

// print_r($_SESSION["user_type"]);


// Display session variable


include "menu.html";

echo "<h1 class='d-flex justify-content-center bg-white p-3 mt-3'>Hello {$_SESSION['user_name']}</h1>";

echo "<h1 class='d-flex justify-content-center '>Place where you sell your product</h1>";

?>


<!DOCTYPE html> <html lang="en"> <head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></head>
<body>


<div class="d-flex justify-content-center align-items-center vh-80">
<form class="w-50 bg-warning p-3" action="upload.php" method="post" enctype="multipart/form-data">
<input class="form-control mt-3" type="text" placeholder="Product name" name="name">
<input class="form-control mt-2" type="text" placeholder="Product price" name="price">
<textarea class="form-control mt-2" name="detail" cols="30" rows="5" placeholder="Product Description"></textarea> <input class="form-control mt-2" type="file" accept=" .jpg, .png, .jpeg" name="pdtimg">
<div class="mt-3 text-center">
<button class="btn btn-success"> Upload Product</button>
</div>
</form>
</div>
</body>
</html>