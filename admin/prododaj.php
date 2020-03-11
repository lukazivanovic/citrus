<?php
include "header.php";
//provera administratora
if (!isset( $_SESSION['login_admin'] ) ) { 
    header("location: loginformaadmin.php");
}
include "connect.php";
$upload_dir = 'img/proizvodi/';
//definisanje podataka o proizvodu
if (isset($_POST['Submit'])) {
	$name = $_POST['name'];
	$opis = $_POST['opis'];
	$imgName = $_FILES['image']['name'];
	$imgTmp = $_FILES['image']['tmp_name'];
	$imgSize = $_FILES['image']['size'];
	if(empty($name)){
		$errorMsg = 'Please input name';
	}else{
		$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
		$allowExt  = array('jpeg', 'jpg', 'png', 'gif');
		$pic = time().'_'.rand(1000,9999).'.'.$imgExt;
		if(in_array($imgExt, $allowExt)){
			if($imgSize < 5000000){
				move_uploaded_file($imgTmp ,$upload_dir.$pic);
			}else{
				$errorMsg = 'Image too large';
			}
		}else{
			$errorMsg = 'Please select a valid image';
		}
	}
	if(!isset($errorMsg)){
		//SQL upit za dodavanje proizvoda
		$sql = "insert into proizvod(Naziv, Opis, Slika) values('".$name."', '".$opis."', '".$pic."')";
		$result = mysqli_query($conn, $sql);
		if($result){
			$successMsg = 'New record added successfully';
			header('Location: adminproizvod.php');
		}else{
			$errorMsg = 'Error '.mysqli_error($conn);
		}
	}		
}
?>
<div class="main">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<a class="btn btn-primary" href="adminproizvod.php" role="button">Назад</a>
				<!--forma za dodavanje novog proizvoda-->
				<form class="" action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="name">назив</label>
						<input type="text" class="form-control" name="name" placeholder="назив" value="" required>
					</div>
					<div class="form-group">
						<label for="name">опис</label>
						<textarea type="text" class="form-control" name="opis" placeholder="опис" rows="3"></textarea>
					</div>
					<div class="form-group">
						<label for="image">изабери слику</label>
						<input type="file" class="form-control" name="image" value="" required>
					</div>
					<div class="form-group">
						<button type="submit" name="Submit" class="btn btn-primary waves">направи производ</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
include "footer.php";
?>