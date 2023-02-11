<?php
  require_once("connexion.php");
  $no_produit=$_GET['noArticle'];
  $sql="SELECT * FROM Articles WHERE noArticle = $no_produit";
  $query=mysqli_query($connexion,$sql);
  $article=mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="dashStyle.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
  <div class="container">
    <nav>
      <ul>
        <li><a href="#" class="logo">
          <img src="images/logo.png">
          <span class="nav-item">Admin</span>
        </a></li>
        <li><a href="dashboard.php">
        <div id="left-navbar" >
          <img src="images/dashboard.png" width="40px" style="margin-left:15px">
          <span class="nav-item">Dashboard</span>
        </div>

        </a></li>
        <li><a href="dashboard_produits.php">
          <div id="left-navbar">
            <img src="images/product.png" id="" width="40px" style="margin-left:15px">
            <span class="nav-item">Produits</span>
          </div>
        </a></li>
        <li><a href="dashboard_commandes.php">
        <div id="left-navbar">
          <img src="images/orders.png" width="40px" style="margin-left:15px">
          <span class="nav-item">Commandes</span>
        </div>
        </a></li>
        <li><a href="#">
        <div id="left-navbar">
          <img src="images/inbox.png" width="40px" style="margin-left:15px">
          <span class="nav-item">Boit de récéption</span>
        </div>
        </a></li>
        <li><a href="#">
        <div id="left-navbar">
          <img src="images/customer.png" width="40px" style="margin-left:15px">
          <span class="nav-item">Clients</span>
        </div>
        </a></li>

        <li><a href="#" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Log out</span>
        </a></li>
      </ul>
    </nav>


    <section class="main">
      <div class="main-top">
        <h1>Modifier le produit</h1>
        <i class="fas fa-user-cog"></i>
      </div>
      

      <section class="core">
        <div class="core-item">
          <form action="modifier.php" method="post"  enctype="multipart/form-data">
            <style>
              #test{
                border: black 1px solid;
              }
            </style>
            <label>Titre</label>
            <input type="hidden" name="noArticle" value="<?php echo $no_produit ?>">
            <input id="test" name="designation" type="text"  value="<?php echo $article["designation"] ?>">
            <br>
            <label>Description</label>
            <br>
            <textarea name="description" id="test" cols="60" rows="20"><?php echo $article["description"] ?></textarea>
            <label>Prix</label>
            <input type="text" id="test" name="prix" value="<?php echo $article["prix"] ?>">
            <label>Quantité</label>
            <input name="quantite" type="text" id="test" value="<?php echo $article["quantite"] ?>">
            <br>
            <img src="<?php echo $article['photo'] ?>" width="100px" id="test"  >
            <input type="file" name="photo" value='<?php echo $article['photo'] ?>'/>
            <input type="submit" value="Enregistrer">
          </form>
        </div>
      </section>
    </section>
  </div>

</body>
</html>
