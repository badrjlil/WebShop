<?php
require_once("connexion.php");

session_start();

if(isset($_GET['pid'])){
	$pid=$_GET['pid'];
}

if(isset($_POST['submit'])){
	$prenom= $_POST['prenom'];
	$nom= $_POST['nom'];
   $email = $_POST['email'];
   $pass = $_POST['pass'];

   $sql="SELECT * FROM Clients WHERE email = '$email' ";
   $query=mysqli_query($connexion,$sql);
   $client=mysqli_fetch_assoc($query);
   if(mysqli_num_rows($query) > 0){
	$message[] = 'Un compte avec cet email existe déjà';
      
   }else{
	$sql="INSERT INTO Clients (prenom, nom, email, password) VALUES ('$prenom','$nom','$email','$pass')";
	$query=mysqli_query($connexion,$sql);
	if(isset($_GET['pid'])){
		header('location:login.php?registered=yes&pid='.$pid);
	}else{
		header('location:login.php?registered=yes');
   }

}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>WebShop - Inscription</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
	<link rel="stylesheet" href="css/style.css">


</head>
<body>
	<?php
        include 'comp/user_header.php';
    ?>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="img/img-01.png" alt="IMG">
				</div>

				<form action="" method="post" class="login100-form validate-form">
					<span class="login100-form-title">
						Inscription
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="prenom" placeholder="Prénom">
						<span class="focus-input100"></span>

					</div>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="nom" placeholder="Nom">
						<span class="focus-input100"></span>

					</div>

					
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>

					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						</span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit">
							S'inscrire
						</button>
					</div>

					<div class="text-center p-t-136">
						<a style="color:white;" class="txt2" href="login.php">
						 Se connecter
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	



</body>
</html>