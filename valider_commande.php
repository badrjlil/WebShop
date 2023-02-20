<?php

    require_once("connexion.php");
    session_start();
    $user_id=$_SESSION['user_id'];
    $prenom = $_POST['prenom'];
    $nom =  $_POST['nom'];
    $adresse =  $_POST['adresse'];
    $ville = $_POST['ville'];
    $region = $_POST['region'];
    $zip = $_POST['zip'];
    $telephone = $_POST['telephone'];
    $total=$_POST['total'];

    $sql="INSERT INTO Adresses (idClient,prenom, nom, adresse, ville, region, zip, telephone) VALUES ($user_id,'$prenom', '$nom', '$adresse', '$region', '$ville', '$zip', $telephone)";
    $query=mysqli_query($connexion,$sql);
    $last_id=mysqli_insert_id($connexion);
    $sql="INSERT INTO Commandes (idClient, adresse_id, prix_total) VALUES ($user_id, $last_id,$total)";
    $query=mysqli_query($connexion,$sql);
    $last_id=mysqli_insert_id($connexion);
    
    $sql="SELECT * FROM Panier WHERE idClient = $user_id";
    $query=mysqli_query($connexion,$sql);
    while($panier=mysqli_fetch_assoc($query)){
        $no_produit=$panier['noArticle'];
        $qts=$panier['qts'];
        $sql="INSERT INTO Commande_details (num, noArticle, quantite) VALUES ($last_id,$no_produit,$qts)";
        $query_insert=mysqli_query($connexion,$sql);
        $sql="UPDATE Articles SET quantite = quantite - $qts WHERE noArticle = $no_produit ";
        $query_quantite=mysqli_query($connexion,$sql);
        
    }
    $sql="DELETE FROM Panier WHERE idClient = $user_id";
    $query=mysqli_query($connexion,$sql);
    
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
	<style>
		@import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
		@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
	</style>
	<link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
</head>
<body>
	<header class="site-header" id="header">
		<h1 class="site-header__title" data-lead-id="site-header-title">MERCI!</h1>
	</header>

	<div class="main-content">
		<i class="fa fa-check main-content__checkmark" id="checkmark"></i>
		<p class="main-content__body" data-lead-id="main-content-body">Merci beaucoup pour vos achats chez nous. Cela signifie beaucoup pour nous, tout comme vous ! Nous apprécions vraiment que vous nous accordiez votre confiance et nous expédierons votre commande dans les plus brefs délais.</p>
	</div>
    <div>
        <br>
        <br>
        <a style="font-size:30px" href="index.php">Accueil</a>
    </div>

	<footer class="site-footer" id="footer">
		<p class="site-footer__fineprint" id="fineprint">©2023 Online Ecommerce Shop</p>
	</footer>
</body>
</html>