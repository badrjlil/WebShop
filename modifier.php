<?php
    require_once("connexion.php");
    $no_produit=$_POST['noArticle'];
    $designation=$_POST['designation'];
    $prix=$_POST['prix'];
    $description=$_POST['description'];
    $quantite=$_POST['quantite'];
    $photo=$_FILES['photo']['name'];
    $photo_path="images/" .$photo;
    $photo_path_tmp=$_FILES['photo']['tmp_name'];
    move_uploaded_file($photo_path_tmp,$photo_path);
    $sql="UPDATE Articles SET designation='$designation', prix=$prix, description='$description', quantite=$quantite, photo='$photo_path' WHERE noArticle=$no_produit";
    $query=mysqli_query($connexion,$sql);
    header("location:dashboard_produits.php");



?>