<?php
  require_once("connexion.php");
  $sql="SELECT * FROM Commandes ORDER BY date DESC, time DESC";
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
        <li><a href="#">
          <i class="fas fa-menorah"></i>
          <span class="nav-item">Dashboard</span>
        </a></li>
        <li><a href="#">
          
          <span class="nav-item">Produits</span>
        </a></li>
        <li><a href="#">
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
        <h1>Populaire Products</h1>
        <i class="fas fa-user-cog"></i>
      </div>
      <div class="product">
        <div class="card">
          <h2>Total orders</h2>
          <h3><?php echo $total['total_orders'] ?></h3>
        </div>
        <div class="card">
        <h2>To be shipped</h2>
        <h3><?php echo $pending_orders['t_p']; ?></h3>
        </div>
        <div class="card">
        <h2>Out of stock</h2>
        <h3><?php echo $outofstock['total'] ?></h3>
        </div>
        <div class="card">
        <h2>Income</h2>
        <h3><?php echo $total['total_earning'] . " MAD" ?></h3>
        </div>
      </div>

      <section class="core">
        <div class="core-item">
          <h1>Latest Order</h1>
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Depart</th>
                <th>Date</th>
                <th>Time</th>
                <th>Product</th>
                <th>Details</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $lines=0;
              while($orders=mysqli_fetch_assoc($articles_query)){
                $lines++;
              ?>
              <tr>
                <td><?php echo $orders['num'] ?></td>
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
                <td><?php echo $article['designation'] ?></td>
                <td><?php echo $orders['date'] ?></td>
                <td><?php echo $orders['time'] ?></td>
                <td><img src="<?php echo $article['photo'] ?>" style="height: 70px;"></td>
                <td><button>View</button></td>
              </tr>
              <?php if($lines==5){break;}} ?>
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
