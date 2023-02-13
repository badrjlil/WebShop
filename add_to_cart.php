<?php
   
if(isset($_POST['add_to_cart'])){
   session_start();
   if(isset($_SESSION['user_id'])){
      $user_id = $_SESSION['user_id'];
   }else{
      $user_id = '';
   }

   if($user_id == ''){
      header('location:login.php');
   }else{
      $pid = $_POST['noArticle'];
      $sql="SELECT * FROM Articles WHERE noArticle = $pid";
            $query=mysqli_query($connexion,$sql);
      $article=mysqli_fetch_assoc($query);
      $name = $article['designation'];
      $price = $article['prix'];
      $sql="SELECT photo1 FROM Photos WHERE noArticle = $pid";
      $query=mysqli_query($connexion,$sql);
      $produit_photo=mysqli_fetch_assoc($query);
      $image = $produit_photo;
      $qts = $_POST['qts'];
      $sql="SELECT * FROM Panier WHERE noArticle = $pid AND idClient = $user_id";
      $query=mysqli_query($connexion,$sql);
      $verif_panier_nbr=mysqli_num_rows($query);
      if($verif_panier_nbr > 0){
         $message[] = 'déjà ajouté au panier !';
      }else{
         $sql="INSERT INTO Panier (idClient, noArticle, qts) VALUES($user_id, $pid, $qts)";
         $query=mysqli_query($connexion,$sql);
      
         $message[] = 'ajouté au panier !';
      
      }

   }

}

?>