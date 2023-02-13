<?php
require_once("connexion.php");

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
   echo "user id : " . $user_id;
}else{
   $user_id = '';
   echo "no user id";
};

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $pass = $_POST['pass'];

   $sql="SELECT * FROM Clients WHERE email = '$email' AND password = '$pass'";
   $query=mysqli_query($connexion,$sql);
   $client=mysqli_fetch_assoc($query);
   /*$select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
   $select_user->execute([$email, $pass]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);*/

   if(mysqli_num_rows($query) > 0){
      $_SESSION['user_id'] = $client['idClient']; 
      header('location:user_login.php');
   }else{
      $message[] = 'incorrect username or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!--<?php include 'components/user_header.php'; ?>-->

<section class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <input type="email" name="email" required placeholder="enter your email" maxlength="50"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" required placeholder="enter your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="login now" class="btn" name="submit">
      <p>don't have an account?</p>
      <a href="user_logout.php" class="option-btn">register now</a>
   </form>

</section>













<!--<?php include 'components/footer.php'; ?>-->

<script src="js/script.js"></script>

</body>
</html>