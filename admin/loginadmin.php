<?php
$error='';
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
    }
    else
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        $connection = mysqli_connect("localhost", "root", "");
        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);
        mysqli_select_db($connection, "citrus");
        $query = mysqli_query($connection, "select * from administrator where Lozinka='$password' AND Korisnicko_ime='$username'");
        $rows = mysqli_num_rows($query);
        if ($rows == 1) {
            $_SESSION['login_admin']=$username;
            header("location: index.php");
        } else {
            $error = "Username or Password is invalid";
        }
        mysqli_close($connection);
    }
}
?>