<?php
include "header.php";
if (!isset($_SESSION['login_admin'])){ 
    header("location: loginformaadmin.php");
}?>
<div class="main">
    <div class="container row justify-content-center">
        <div class="col-md-6">
            <h1>АДМИН</h1>
            <br>
            <a class="btn btn-primary" href="adminproizvod.php"><i class="fas fa-microchip"></i> Сви производи</a><br><br>
            <a class="btn btn-primary" href="adminkomentar.php"><i class="fas fa-user"></i> Сви пристигли коментари</a><br><br>
            <a class="btn btn-primary" href="adminobkomentar.php"><i class="fas fa-poll-h"></i> Сви објављени коментари</a><br><br>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>