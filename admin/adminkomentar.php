<?php
include "header.php";
//provera administratora
if (!isset( $_SESSION['login_admin'] ) ) { 
    header("location: loginformaadmin.php");
}?>
<div class="container">
  <div class="row d-flex justify-content-center">
    <?php 
    //pocetak konekcije
    $mysqli = new mysqli("localhost", "root", "", "citrus");
    mysqli_set_charset( $mysqli, 'utf8');
    $query = "SELECT * FROM komentar";
    $result = $mysqli->query($query);
    if(isset($_GET['publish'])){
      $id = $_GET['publish'];
      //SQL upit za izbor komentara
      $sql = "select * from komentar where ID = ".$id;
      $result = mysqli_query($mysqli, $sql);
      if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        //SQL upit za objavljivanje komentara na pocetnu stranu
        $sql = "insert into obkomentar select * from komentar where ID=".$id;
        $sql1 = "delete from komentar where ID=".$id;
        if(mysqli_query($mysqli, $sql) && mysqli_query($mysqli, $sql1)){
          header('location:adminkomentar.php');
        }
      }
    }
    if(isset($_GET['delete'])){
      $id = $_GET['delete'];
      //SQL upit za izbor komentara
      $sql = "select * from komentar where ID = ".$id;
      $result = mysqli_query($mysqli, $sql);
      if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        //SQL upit za brisanje komentara
        $sql = "delete from komentar where ID=".$id;
        if(mysqli_query($mysqli, $sql)){
          header('location:adminkomentar.php');
        }
      }
    }
    ?>
    <a class="btn btn-primary mr-md-3" href="./" role="button">Назад</a>
    <a class="btn btn-primary" href="komdodaj.php" role="button">Додај...</a>
    <!--tabela za prikaz svih korisnika-->
    <table class="table table-striped table-bordered table-hover table-sm" id="tabela">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Датум</th>
          <th scope="col">Име</th>
          <th scope="col">Имејл</th>
          <th scope="col">Текст</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php
        while($row = mysqli_fetch_array($result)) {
          echo "<tr>";
          echo "<th scope='row'>".$row['ID']."</th>";
          echo "<td>".$row['Datum']."</td>";
          echo "<td>".$row['Ime']."</td>";
          echo "<td>".$row['Email']."</td>";
          echo "<td>".$row['Text']."</td>"; ?>
          <td>
            <a href="komvidi.php?id=<?php echo $row['ID'] ?>" class="btn btn-dark"><i class="fa fa-eye"></i></a>
            <a href="adminkomentar.php?publish=<?php echo $row['ID'] ?>" class="btn btn-success" onclick="return confirm('Да ли хоћеш да објавиш овај коментар на почетну страну?')"><i class="fa fa-plus"></i></a>
            <a href="komizmeni.php?id=<?php echo $row['ID'] ?>" class="btn btn-info"><i class="fa fa-user-edit"></i></a>
            <a href="adminkomentar.php?delete=<?php echo $row['ID'] ?>" class="btn btn-danger" onclick="return confirm('Да ли хоћеш да избришеш овај коментар?')"><i class="fa fa-trash-alt"></i></a>
          </td>
        <?php echo "</tr>";
        }
        ?>
      </tbody>
    </table>
    <?php
    //zatvaranje konekcije
    $result->close();
    $mysqli->close();
    ?>
  </div>
</div>
<?php
include "footer.php";
?>