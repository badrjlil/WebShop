<?php
require_once("connect.php");
$requete="select id,email,date,heure,substr(message,1,20) as messageko,Statut from messages where Statut='Unread'";
$reponse=mysqli_query($conn,$requete);
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
        <li><a href="/WebShop/admin">
        <div id="left-navbar" >
          <img src="images/dashboard.png" width="40px" style="margin-left:15px">
          <span class="nav-item">Dashboard</span>
        </div>

        </a></li>
        <li><a href="produits.php">
          <div id="left-navbar">
            <img src="images/product.png" width="40px" style="margin-left:15px">
            <span class="nav-item">Produits</span>
          </div>
        </a></li>
        <li><a href="commandes.php">
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
          <h3>1</h3>
        </div>
        <div class="card">
        <h2>To be shipped</h2>
        <h3>1</h3>
        </div>
        <div class="card">
        <h2>Out of stock</h2>
        <h3>3</h3>
        </div>
        <div class="card">
        <h2>Income</h2>
        <h3>39 340,00 MAD</h3>
        </div>
      </div>

      <section class="core">
        <div class="core-item">
          <h1>Commandes en attente</h1>
          <table class="table" id="tale1">
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
                            <tr>
                <td>#00051</td>
                                <td>test test</td>
                <td>39 340,00 MAD</td>
                <td>2023-02-15 12:27:23</td>
                <td>01:00</td>
                
                <td><button onclick="window.location.href='commande.php?num=51'">Afficher</button></td>
              </tr>
                           
            </tbody>
          </table>
        </div>
        <div id="corearrange">
        <div class="core-item2" >
          <h1>Latest messages</h1>
          <table class="table" >
            <thead  >
              <tr>
                <th>ID</th>
                <th>email</th>
                <th>message</th>
                <th>Date</th>
                <th>Time</th>      
                <th>Statut</th>
              </tr>
            </thead>
            <tbody>
              <?php
                 $i=0;
                 while($row=mysqli_fetch_assoc($reponse)){
                  if($i==3){
                  break;
                 }
                 else{
              ?>
              <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['messageko']?></td>
                <td><?php echo $row['date']?></td>
                <td><?php echo $row['heure']?></td>
                <td><?php echo $row['Statut'] ?></td>
              </tr>
             <?php 
             
             $i=$i+1;
                 }
                }
             ?>       
            </tbody>
          </table>
        </div>
        <div class="core-item3">
          <h1>Commandes en attente</h1>
          <table class="table" >
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
                            <tr>
                <td>#00051</td>
                                <td>test test</td>
                <td>39 340,00 MAD</td>
                <td>2023-02-15 12:27:23</td>
                <td>01:00</td>
                
                <td></td>
              </tr>
                           
            </tbody>
          </table>
        </div>
        </div>
      </section>
    </section>
  </div>

</body>
</html>
