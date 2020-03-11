<?php
include "header.php";
//otvaranje konekcije 
$mysqli = new mysqli("localhost", "root", "", "citrus");
mysqli_set_charset( $mysqli, 'utf8');
//SQL upit za trazenje proizvoda
$query = "SELECT * FROM proizvod";
$result = $mysqli->query($query);

if (isset($_POST['Submit'])) {
	$ime = $_POST['ime'];
	$email = $_POST['email'];
	$tekst = $_POST['tekst'];
	if(!isset($errorMsg)){
		//SQL upit za dodavanje komentara
		$sql = "insert into komentar(Datum, Ime, Email, Text) values('".date("Y-m-d")."', '".$ime."', '".$email."', '".$tekst."')";
		$result = mysqli_query($conn, $sql);
		if($result){
			$successMsg = 'New record added successfully';
			header('Location: adminkomentar.php');
		}else{
			$errorMsg = 'Error '.mysqli_error($conn);
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
                        <div class="card h-100">
                            <img src="admin/img/proizvodi/<?php echo $row['Slika']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['Naziv']; ?></h5>
                                <p class="card-text"><?php echo $row['Opis']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <?php
                //zatvaranje konekcije
                $result->close();
                $mysqli->close();
                ?>
            
                <!--sekcija sa odobrenim komentarima-->
                <h2>Коментари</h2>
                <p>komentari.......</p>

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
</div>
<?php
include "footer.php";
?>