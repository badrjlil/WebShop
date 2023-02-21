<?php
session_start();
if(isset($_SESSION['user_id'])){
  $user_id = $_SESSION['user_id'];
  $sql="SELECT prenom, nom FROM Clients WHERE idClient = $user_id AND type = 'Administrateur'";
  $query_user=mysqli_query($connexion,$sql);
  $user=mysqli_fetch_assoc($query_user);
  if(!mysqli_num_rows($query_user) > 0){
    header("location:login.php");
  }
}else{
  header("location:login.php");
}

?>
<div id="mySidenav" class="sidenav">
	<p class="logo"><span>J</span>ade Shop</p>
  <a href="index.php" class="icon-a"><i class="fa fa-dashboard icons"></i> &nbsp;&nbsp;Dashboard</a>
  <a href="products.php" class="icon-a"><i class="fa fa-tasks icons"></i> &nbsp;&nbsp;Produits</a>
  <a href="orders.php" class="icon-a"><i class="fa fa-shopping-bag icons"></i> &nbsp;&nbsp;Commandes</a>
  <a href="inbox.php" class="icon-a"><i class="fa fa-inbox icons"></i> &nbsp;&nbsp;Boîte de réception</a>
  <a href="users.php" class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Comptes</a>
</div>


<div id="main">

	<div class="head">
		<div class="col-div-6">
<span style="font-size:30px;cursor:pointer; color: white;" class="nav"  >&#9776; Tableau de bord</span>
<span style="font-size:30px;cursor:pointer; color: white;" class="nav2"  >&#9776; Tableau de bord</span>
</div>
	
	<div class="col-div-6">
	  <div class="profile">
      <img src="images/user.png" class="pro-img" />
      <p><?php echo $user['prenom'] . " " . $user['nom'] ?> <span><a style=" color:gray;" href="admin_logout.php">Log Out</a></span></p>
  </div>
  </div>
	<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<br/>