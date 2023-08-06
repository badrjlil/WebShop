<?php
require_once("../connexion.php");

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $pass = $_POST['pass'];

   $sql="SELECT * FROM Clients WHERE email = '$email' AND password = '$pass' AND type = 'Administrateur'";
   $query=mysqli_query($connexion,$sql);
   $client=mysqli_fetch_assoc($query);

   if(mysqli_num_rows($query) > 0){
      $_SESSION['user_id'] = $client['idClient']; 
      header('location:index.php');
   }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>WebShop - Connexion</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" href="../style.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../img/img-01.png" alt="IMG">
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
						
					</div>
				</form>
			</div>
		</div>
	</div>
	


</body>
</html>