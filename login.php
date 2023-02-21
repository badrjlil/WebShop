<?php
require_once("connexion.php");

session_start();
if(isset($_GET['registered'])){
	$message[] = 'Compte a été créé, connectez-vous maintenant';
}
if(!isset($_SESSION['user_id'])){
   

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $pass = $_POST['pass'];

   $sql="SELECT * FROM Clients WHERE email = '$email' AND password = '$pass' AND type = 'Utilisateur'";
   $query=mysqli_query($connexion,$sql);
   $client=mysqli_fetch_assoc($query);

   if(mysqli_num_rows($query) > 0){
      $_SESSION['user_id'] = $client['idClient']; 
	  if(isset($_GET['pid'])){
		$no_produit=$_GET['pid'];
		header('location:produit.php?noArticle='.$no_produit);
	  }elseif(isset($_POST['pid'])){
			$no_produit=$_POST['pid'];
			header('location:produit.php?noArticle='.$no_produit);
	  }
	  else
	  {
		header('location:/');
	  }
      
   }else{
      $message[] = 'incorrect username or password!';
   }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>WebShop - Connexion</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body>
	<?php
        include 'comp/user_header.php';
    ?>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form action="" method="post" class="login100-form validate-form">
					<span class="login100-form-title">
						S'identifier
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>

					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit">
							Se connecter
						</button>
					</div>


					<div class="text-center p-t-136">
						<a style="color:white" class="txt2" href="register.php<?php if(isset($_GET['pid'])){echo '?pid=' . $_GET['pid']; } ?>">
							Créez votre compte
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<?php
}else{
	$user_id = $_SESSION['user_id'];
	$sql="SELECT * FROM Clients WHERE idclient = $user_id";
   $query=mysqli_query($connexion,$sql);
   $client=mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>WebShop - Connexion</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body>
	<?php
        include 'comp/user_header.php';
    ?>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form action="user_logout.php" method="post" class="login100-form validate-form">
					<span class="login100-form-title">
						<?php
						echo $client['prenom'] . " " . $client['nom'];
						?>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="hidden" name="email" placeholder="Email">
						<span class="focus-input100"></span>

					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="hidden" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" >
						Se déconnecter
						</button>
					</div>

					<div style="margin-bottom:40%">

					</div>
					<div class="text-center p-t-136">
						<a class="txt2">
							
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<?php
}
?>