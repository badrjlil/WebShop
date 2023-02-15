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
    }
    $sql="DELETE FROM Panier WHERE idClient = $user_id";
    $query=mysqli_query($connexion,$sql);
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Merci, Nsebna 3lik</h1>
</body>
</html>