<?php
include "header.php";
if (!isset( $_SESSION['login_admin'] ) ) { 
    header("location: loginformaadmin.php");
}?>
<div class="main">
  <div class="container">
    <?php
    include "connect.php";
    $upload_dir = 'img/proizvodi/';
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $sql = "select * from proizvod where ID=".$id;
      $result = mysqli_query($mysqli, $sql);
      if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
      }else {
        $errorMsg = 'Could not Find Any Record';
      }
    }
    ?>
    <a class="btn btn-primary" href="adminproizvod.php" role="button">Назад</a>
    <div class="proizvodSlika">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <img class='img-thumbnail' src='<?php echo $upload_dir.$row['Slika']; ?>' alt="...">
        </div>
        <div class="col-sm-12 col-md-6">
          <p><?php echo $row['Naziv']; ?></p>
          <p><?php echo $row['Slika']; ?></p>
        </div>
      </div>
    <br>
    <p class="text-justify" style="white-space: pre-line;"><?php echo $row['Opis']; ?></p>
    </div>
  </div>
</div>
<?php
include "footer.php";
?>