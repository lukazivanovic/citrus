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
      //SQL upit za izbor komentara
      $sql = "select * from obkomentar where ID=".$id;
      $result = mysqli_query($mysqli, $sql);
      if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
      }else {
        $errorMsg = 'Could not Find Any Record';
      }
    }
    //definisanje podataka
    if(isset($_POST['Submit'])){
      $ime = $_POST['ime'];
      $email = $_POST['email'];
      $tekst = $_POST['tekst'];
      //SQL upit za izmenu komentara
      if(!isset($errorMsg)){
        $sql = "update obkomentar set Ime = '".$ime."', Email = '".$email."', Text = '".$tekst."' where ID=".$id;
        $result = mysqli_query($mysqli, $sql);
        if($result){
          $successMsg = 'New record updated successfully';
          header('Location:adminobkomentar.php');
        }else{
          $errorMsg = 'Error '.mysqli_error($mysqli);
        }
      }
    }
    ?>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <a class="btn btn-primary" href="adminobkomentar.php" role="button">Назад</a>
        <!--forma za izmenu podataka o komentaru-->
        <form class="" action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Име</label>
            <input type="text" class="form-control" name="ime" placeholder="Име" value="<?php echo $row['Ime']; ?>" required>
          </div>
          <div class="form-group">
            <label for="name">Имејл</label>
            <input type="text" class="form-control" name="email" placeholder="Имејл" value="<?php echo $row['Email']; ?>" required>
          </div>
          <div class="form-group">
            <label for="name">Текст</label>
            <textarea type="text" class="form-control" name="tekst" placeholder="Текст" rows="6" required><?php echo $row['Text']; ?></textarea>
          </div>
          <div class="form-group">
            <button type="submit" name="Submit" class="btn btn-primary waves">измени коментар</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
include "footer.php";
?>