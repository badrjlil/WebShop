<?php
  require_once("connexion.php");
  $sql="SELECT * FROM Commandes WHERE status = 'Pending' ORDER BY date DESC, time DESC";
  $pending_commande=mysqli_query($connexion,$sql);
  $sql="SELECT COUNT(*) AS 'total_orders', SUM(prix_total) AS 'total_earning' FROM Commandes WHERE status != 'Canceled'";
  $total=mysqli_fetch_assoc(mysqli_query($connexion,$sql));
  $sql="SELECT COUNT(*) AS 'total' FROM Articles WHERE quantite <1";
  $outofstock=mysqli_fetch_assoc(mysqli_query($connexion,$sql));
  $sql="SELECT COUNT(*) AS 't_p' FROM Commandes WHERE status = 'Pending'";
  $total_pending_orders=mysqli_fetch_assoc(mysqli_query($connexion,$sql));
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
            <img src="images/product.png" width="40px" style="margin-left:15px">
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
        <h1>Tableau de bord</h1>
        <i class="fas fa-user-cog"></i>
      </div>
      <div class="product">
        <div class="card">
          <h2>Total orders</h2>
          <h3><?php echo $total['total_orders'] ?></h3>
        </div>
        <div class="card">
        <h2>To be shipped</h2>
        <h3><?php echo $total_pending_orders['t_p']; ?></h3>
        </div>
        <div class="card">
        <h2>Out of stock</h2>
        <h3><?php echo $outofstock['total'] ?></h3>
        </div>
        <div class="card">
        <h2>Income</h2>
        <h3><?php echo number_format($total['total_earning'], 2, ',', ' ')  . " MAD" ?></h3>
        </div>
      </div>

      <section class="core">
        <div class="core-item">
          <h1>Commandes en attente</h1>
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Total</th>
                <th>Date</th>
                <th>Time</th>      
                <th>Details</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $lines=0;
              while($orders=mysqli_fetch_assoc($pending_commande)){
                $lines++;
              ?>
              <tr>
                <td><?php echo "#" . sprintf('%05d', $orders['num']) ?></td>
                <?php 
                  $idClient=$orders['idClient'];
                  $sql="SELECT * FROM Clients WHERE idClient = '$idClient'";
                  $query=mysqli_query($connexion,$sql);
                  $client=mysqli_fetch_assoc($query);
                ?>
                <td><?php echo $client['prenom'] . " " . $client['nom'] ?></td>
                <td><?php echo number_format($orders['prix_total'], 2, ',', ' ')  . " MAD" ?></td>
                <td><?php echo $orders['date'] ?></td>
                <td><?php echo date("H:i", strtotime($orders['time'])) ?></td>
                
                <td><button onclick="window.location.href='commande.php?num=<?php echo $orders['num'] ?>'">Afficher</button></td>
              </tr>
              <?php if($lines==5){break;}} ?>             
            </tbody>
          </table>
        </div>
      </section>
    </section>
  </div>

</body>
</html>
