<?php
include "header.php";
//otvaranje konekcije 
$mysqli = new mysqli("localhost", "root", "", "citrus");
mysqli_set_charset( $mysqli, 'utf8');
//SQL upit za trazenje proizvoda
$query = "SELECT * FROM proizvod";
$result = $mysqli->query($query);
$queryKom = "SELECT * FROM obkomentar";
$resultKom = $mysqli->query($queryKom);

if (isset($_POST['Submit'])) {
	$ime = $_POST['ime'];
	$email = $_POST['email'];
	$tekst = $_POST['tekst'];
	if(!isset($errorMsg)){
		//SQL upit za dodavanje komentara
		$sql = "insert into komentar(Datum, Ime, Email, Text) values('".date("Y-m-d")."', '".$ime."', '".$email."', '".$tekst."')";
		$result = mysqli_query($mysqli, $sql);
		if($result){
            //$successMsg = 'New record added successfully';
			header('Location: index.php');
        }else{
            $errorMsg = 'Error '.mysqli_error($mysqli);
        }
    }
}
?>
    <div class="main">
        <div class="container">
            <div id="content">
                <!--katalog proizvoda-->
                <h2>Производи</h2>
                <div class="row">
                    <?php while($row = mysqli_fetch_array($result)) {?>
                    <div class="col mb-3 col-md-4 col-sm-6 col-12">
                        <div class="card h-100 shadow-lg border border-dark">
                            <img src="admin/img/proizvodi/<?php echo $row['Slika']; ?>" class="card-img-top" alt="...">
                            <div class="card-body border-top border-success">
                                <h5 class="card-title font-weight-bold"><?php echo $row['Naziv']; ?></h5>
                                <p class="card-text"><?php echo $row['Opis']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                
                <!--sekcija sa odobrenim komentarima-->
                <h2>Коментари</h2>
                <ul class="list-unstyled">
                    <?php while($rowKom = mysqli_fetch_array($resultKom)) {?>
                    <li class="media bg-light text-dark rounded-lg mb-3 mt-3">
                        <i class="fas fa-lemon fa-3x mr-3 ml-3 align-self-center"></i>
                        <div class="media-body mr-3">
                        <h5 class="mt-0 mb-1"><?php echo $rowKom['Ime']; ?> (<?php echo $rowKom['Datum']; ?>)</h5>
                        <?php echo $rowKom['Text']; ?>
                        </div>
                    </li>
                    <?php } ?>
                </ul>

                <!--forma za slanje komentara-->
                <h2>Пошаљите нам коментар</h2>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <!--forma za dodavanje novog komentara-->
                        <form class="" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">име</label>
                                <input type="text" class="form-control" name="ime" placeholder="име" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="name">имејл</label>
                                <input type="text" class="form-control" name="email" placeholder="имејл" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="name">текст</label>
                                <textarea type="text" class="form-control" name="tekst" placeholder="текст" rows="3" required></textarea>
                            </div>
                                <div class="form-group">
                                <button type="submit" name="Submit" class="btn btn-primary waves">направи коментар</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <?php
            //zatvaranje konekcije
            $result->close();
            $mysqli->close();
        ?>
</div>
<?php
include "footer.php";
?>