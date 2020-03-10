<?php
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "citrus");
session_start();
$user_check=$_SESSION['login_admin'];
$ses_sql=mysqli_query("select Korisnicko_ime from administrator where Korisnicko_ime='$user_check'", $connection);
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['Korisnicko_ime'];
if(!isset($login_session)){
    mysqli_close($connection);
    header('Location: index.php');
}
?>