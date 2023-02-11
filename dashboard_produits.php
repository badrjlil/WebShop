<?php
  require_once("connexion.php");
  $sql="SELECT * FROM Articles ORDER BY date DESC";
  $articles_query=mysqli_query($connexion,$sql);
  $sql="SELECT COUNT(*) AS 'total_orders' , ROUND(SUM(a.prix),2) AS 'total_earning'  FROM Articles a, Clients cl, Commandes c WHERE cl.idClient = c.idClient AND c.noArticle = a.noArticle AND c.status != 'Canceled'";
  $total=mysqli_fetch_assoc(mysqli_query($connexion,$sql));
  $sql="SELECT COUNT(*) AS 'total' FROM Articles WHERE quantite <1";
  $outofstock=mysqli_fetch_assoc(mysqli_query($connexion,$sql));
  $sql="SELECT COUNT(*) AS 't_p' FROM Commandes WHERE status = 'Pending'";
  $pending_orders=mysqli_fetch_assoc(mysqli_query($connexion,$sql));
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
          <img src="img/logo.png">
          <span class="nav-item">Admin</span>
        </a></li>
        <li><a href="dashboard.php">
          <i class="fas fa-menorah"></i>
          <span class="nav-item">Dashboard</span>
        </a></li>
        <li><a href="dashboard_produits.php">
          
          <span class="nav-item">Produits</span>
        </a></li>
        <li><a href="dashboard_commandes.php">
          <i class="fas fa-database"></i>
          <span class="nav-item">Commandes</span>
        </a></li>
        <li><a href="#">
          
          <span class="nav-item">Boit de reseption</span>
        </a></li>
        <li><a href="#">
          <i class="fas fa-user-tie"></i>
          <span class="nav-item">Clients</span>
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
                <td><img src="<?php echo $article['photo'] ?>" style="height: 70px;"></td>
                <td><?php echo $article['designation'] ?></td>
                <td><?php echo $article['quantite'] ?></td>
                <td><?php echo $article['prix'] ?></td>
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
                
                <td><button>View</button></td>
              </tr>
              <?php if($lines==10){break;}} ?>
              <!-- <tr class="active">
                <td>02</td>
                <td>Bader Jlil</td>
                <td>Apple Watch</td>
                <td>03-24-22</td>
                <td>9:00AM</td>
                <td><img src="images/Iphone 14 Pro - Deep Purple.jpg" style="height: 70px;"></td>
                <td><button>View</button></td>
              </tr>
              <tr>
                <td>03</td>
                <td>Hassan Malki</td>
                <td>MacBook Pro</td>
                <td>03-24-22</td>
                <td>8:00AM</td>
                <td><img src="images/Iphone 14 Pro - Deep Purple.jpg" style="height: 70px;"></td>
                <td><button>View</button></td>
              </tr>
              <tr>
                <td>04</td>
                <td>Yasser Zamel</td>
                <td>Ipad Pro</td>
                <td>03-24-22</td>
                <td>8:00AM</td>
                <td><img src="images/Iphone 14 Pro - Deep Purple.jpg" style="height: 70px;"></td>
                <td><button>View</button></td>
              </tr>-->
              
            </tbody>
          </table>
        </div>
      </section>
    </section>
  </div>

</body>
</html>
