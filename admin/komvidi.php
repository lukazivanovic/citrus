<?php
include "header.php";
//provera administratora
if (!isset( $_SESSION['login_admin'] ) ) { 
    header("location: loginformaadmin.php");
}?>
<div class="main">
  <div class="container">
    <?php
    include "connect.php";
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      //SQL upit za izbor kategorije
      $sql = "select * from komentar where ID=".$id;
      $result = mysqli_query($mysqli, $sql);
      if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
      }else {
        $errorMsg = 'Could not Find Any Record';
      }
    }
    ?>
    <!--prikaz kategorije-->
    <div class="row justify-content-center">
      <div class="col-md-6">
        <a class="btn btn-primary" href="adminkomentar.php" role="button">Назад</a>
        <p><?php echo $row['Datum'] ?></p>
        <p><?php echo $row['Ime'] ?></p>
        <p><?php echo $row['Email'] ?></p>
        <p><?php echo $row['Text'] ?></p>
      </div>
    </div>
  </div>
</div>
<?php
include "footer.php";
?>