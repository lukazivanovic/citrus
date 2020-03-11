<?php
include "header.php";
include "loginadmin.php";
if(isset($_SESSION['login_admin'])){
header("location: index.php");
}
?>
<div id="main" class="container">
    <div class="row justify-content-center">
	    <div class="col-md-6">
            <div id="login">
                <h2>ПРИЈАВА админ</h2>
                <form action="" method="post">
                    <label>корисничко име :</label>
                    <input id="name" name="username" placeholder="корисничко име" type="text" required>
                    <label>лозинка :</label>
                    <input id="password" name="password" placeholder="*****" type="password" required>
                    <input name="submit" type="submit" value=" ПРИЈАВИ СЕ ">
                    <span><?php echo $error; ?></span><br><br>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>