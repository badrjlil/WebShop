<?php
    require_once("../connexion.php");
    $product_id=$_GET['noArticle'];
    echo $product_id;
    $sql="UPDATE Articles SET status = 'inactive' WHERE noArticle = $product_id";
    $query=mysqli_query($connexion,$sql);
    header("location:products.php");
?>