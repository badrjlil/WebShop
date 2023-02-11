<?php
  require_once("connexion.php");
  $sql="SELECT * FROM Commandes ORDER BY date DESC, time DESC";
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
        <h1>Les commandes</h1>
        <i class="fas fa-user-cog"></i>
      </div>
      

      <section class="core">
        <div class="core-item">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Total</th>
                <th>Status</th>
                <th>Date</th>
                <th>Time</th>
                <th>Details</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $lines=0;
              while($orders=mysqli_fetch_assoc($articles_query)){
                $lines++;
              ?>
              <tr <?php if($orders['status'] == "Pending"){ echo "style='background-color: khaki'";} ?>>
                <td><?php echo sprintf('%05d', $orders['num']);  ?></td>
                <?php 
                  $idClient=$orders['idClient'];
                  $noArticle=$orders['noArticle'];
                  $sql="SELECT * FROM Clients WHERE idClient = '$idClient'";
                  $query=mysqli_query($connexion,$sql);
                  $client=mysqli_fetch_assoc($query);
                  $sql="SELECT * FROM Articles WHERE noArticle = '$noArticle'";
                  $query=mysqli_query($connexion,$sql);
                  $article=mysqli_fetch_assoc($query);
                ?>
                <td><?php echo $client['prenom'] . " " . $client['nom'] ?></td>
                <td><?php echo number_format($orders['prix_total'], 2, ',', ' ')  . " MAD" ?></td>
                <td><?php echo $orders['status'] ?></td>
                <td><?php echo $orders['date'] ?></td>
                <td><?php echo date("H:i", strtotime($orders['time'])) ?></td>
                <td><button onclick="window.location.href='commande.php?num=<?php echo $orders['num'] ?>'">Afficher</button></td>
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
