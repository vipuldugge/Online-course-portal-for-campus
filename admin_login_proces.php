<?php
session_start();

$un = "root";
$upw = "";
$host = "localhost";
$conn = mysqli_connect($host, $un, $upw);

$username = $_POST['username'];
$password = $_POST['password'];

if ($username == "suyog" && $password == "suyog") {
    $_SESSION['admin_session'] = $username;
    header('Location:user_list.php');
} else {
    header('Location:adminlogin.php');
}

mysqli_close($conn); // Close the database connection after use
?>
