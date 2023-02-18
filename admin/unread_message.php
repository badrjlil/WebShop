<?php
    require_once("../connexion.php");
    $message_id=$_GET['id'];
    $sql="UPDATE messages SET statut = 'Unread' WHERE id = $message_id";
    $query=mysqli_query($connexion,$sql);
    header("location:inbox.php");
?>