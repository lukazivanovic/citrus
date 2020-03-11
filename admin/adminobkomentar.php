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
    $query = "SELECT * FROM obkomentar";
    $result = $mysqli->query($query);
    if(isset($_GET['delete'])){
      $id = $_GET['delete'];
      //SQL upit za izbor komentara
      $sql = "select * from obkomentar where ID = ".$id;
      $result = mysqli_query($mysqli, $sql);
      if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $image = $row['image'];
        unlink($upload_dir.$image);
        //SQL upit za brisanje komentara
        $sql = "delete from obkomentar where ID=".$id;
        if(mysqli_query($mysqli, $sql)){
          header('location:adminobkomentar.php');
        }
      }
    }
    ?>
    <a class="btn btn-primary mr-md-3" href="./" role="button">Назад</a>
    <a class="btn btn-primary" href="obkomdodaj.php" role="button">Додај...</a>
    <!--tabela za prikaz svih komentara-->
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
            <a href="obkomvidi.php?id=<?php echo $row['ID'] ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
            <a href="obkomizmeni.php?id=<?php echo $row['ID'] ?>" class="btn btn-info"><i class="fa fa-user-edit"></i></a>
            <a href="adminobkomentar.php?delete=<?php echo $row['ID'] ?>" class="btn btn-danger" onclick="return confirm('Да ли хоћеш да избришеш овај коментар?')"><i class="fa fa-trash-alt"></i></a>
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