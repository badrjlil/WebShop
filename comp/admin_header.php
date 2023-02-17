<?php
    if(isset($message)){
        foreach($message as $message){
            echo '
            <div style="background-color: black;" class="message">
                <span>'.$message.'</span>
                <i class="fas fa-times" id="close-button" onclick="this.parentElement.remove();"></i>
            </div>
            ';
        }
    }
?>

<div id="mySidenav" class="sidenav">
	<p class="logo"><span>J</span>ade Shop</p>
  <a href="index.php" class="icon-a"><i class="fa fa-dashboard icons"></i> &nbsp;&nbsp;Dashboard</a>
  <a href="products.php"class="icon-a"><i class="fa fa-tasks icons"></i> &nbsp;&nbsp;Produits</a>
  <a href="orders.php"class="icon-a"><i class="fa fa-shopping-bag icons"></i> &nbsp;&nbsp;Commandes</a>
  <a href="#"class="icon-a"><i class="fa fa-inbox icons"></i> &nbsp;&nbsp;Boîte de réception</a>
  <a href="#"class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Comptes</a>
</div>


<div id="main">

	<div class="head">
		<div class="col-div-6">
<span style="font-size:30px;cursor:pointer; color: white;" class="nav"  >&#9776; Dashboard</span>
<span style="font-size:30px;cursor:pointer; color: white;" class="nav2"  >&#9776; Dashboard</span>
</div>
	
	<div class="col-div-6">
	  <div class="profile">
      <img src="images/user.png" class="pro-img" />
      <p>Manoj Adhikari <span>UI / UX DESIGNER</span></p>
  </div>
  </div>
	<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<br/>