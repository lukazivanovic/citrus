<?php
include "header.php";
//provera administratora
if (!isset( $_SESSION['login_admin'])) { 
    header("location: loginformaadmin.php");
}
include "connect.php";
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
		<div class="row justify-content-center">
			<div class="col-md-6">
				<a class="btn btn-primary" href="adminkomentar.php" role="button">Назад</a>
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
include "footer.php";
?>