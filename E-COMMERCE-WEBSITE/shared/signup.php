<?php
// Your PHP code starts here

// print_r($_POST);

// $conn = new mysqli("localhost", "root", "", "acme", 3306);

include "sqlconnection.php";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['username'];
$password = $_POST['password'];
$usertype = $_POST['usertype'];

$sql = "INSERT INTO user (user_name, password, user_type) VALUES ('$name', '$password', '$usertype')";

if (mysqli_query($conn, $sql)) {
    echo "Successful Insertion";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

header("Location: login_.html");
?>

<!-- Close the PHP tag before writing HTML
<form action="http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=acme&table=user" method="get">
    <button type="submit">Check your data in SQL</button>
</form>

<?php
// You can reopen PHP if more PHP code follows
?> -->
