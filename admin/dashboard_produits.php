<?php
  require_once("connexion.php");
  $sql="SELECT * FROM Articles ORDER BY date DESC";
  $articles_query=mysqli_query($connexion,$sql);
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
        <li><a href="dashboard.php" class="logo">
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
        <h1>Les produits</h1>
        <i class="fas fa-user-cog"></i>
      </div>
      

      <section class="core">
        <div class="core-item">
          <button onclick="window.location.href='ajouter_produit.php'">Ajouter produit</button>
          <table class="table">
            <thead>
              <tr>
                <th>Photo</th>
                <th>Nom</th>
                <th>Quantité</th>
                <th>Prix</th>
                <th>Catégorie</th>
                <th>Date</th>
                <th>Details</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $lines=0;
              while($article=mysqli_fetch_assoc($articles_query)){
                $lines++;
              ?>
              <tr>
                <?php
                $no_produit=$article['noArticle'];
                $sql="SELECT photo1 FROM Photos WHERE noArticle = $no_produit";
                $query=mysqli_query($connexion,$sql);
                $photo_produit=mysqli_fetch_assoc($query);
                ?>
                <td><img src="<?php echo "../" . $photo_produit['photo1'] ?>" style="height: 70px;"></td>
                <td><?php echo $article['designation'] ?></td>
                <td><?php echo $article['quantite'] ?></td>
                <td><?php echo number_format($article['prix'], 2, ',', ' ')  . " MAD" ?></td>
                <?php
                  $idSubCategorie=$article['idCategorie'];
                  $sql="SELECT * FROM SubCategories WHERE idCategorie = $idSubCategorie";
                  $query=mysqli_query($connexion,$sql);
                  $sub_categorie=mysqli_fetch_assoc($query);
                  $idCategorie=$sub_categorie['categorie'];
                  $sql="SELECT nomCategorie FROM Categories WHERE idCategorie = $idCategorie";
                  $query=mysqli_query($connexion,$sql);
                  $categorie=mysqli_fetch_assoc($query);

                ?>
                <td><?php echo $categorie['nomCategorie'] . "/" . $sub_categorie['nomCategorie'] ?></td>
                <td><?php echo date("d-m-Y", strtotime($article['date'])) ?></td>
                
                <td><button onclick="window.location.href='dashboard_produit.php?noArticle=<?php echo $article['noArticle'] ?>'">Modifier</button></td>
              </tr>
              <?php 
              } 
              ?>
            </tbody>
          </table>
        </div>
      </section>
    </section>
  </div>

</body>
</html>
