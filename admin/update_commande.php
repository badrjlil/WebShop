<?php
    require_once("../connexion.php");
    $num_commande=$_POST['num'];
    $status=$_POST['status'];
    $sql="UPDATE Commandes SET status='$status' WHERE num=$num_commande";
    $query=mysqli_query($connexion,$sql);
    header("location:orders.php");

?>