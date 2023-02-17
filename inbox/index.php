<?php
echo "test1";
require_once("connexion2.php");
echo "test2";
$requete="select id,nom,prenom,email,telephone,substr(message,1,20) as messageko,Statut,date,heure from messages";
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
        <h1>Messages</h1>
        <i class="fas fa-user-cog"></i>
      </div>
      <section class="core">
        <div class="core-item">
                <table class="table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nom</th>
                      <th>Prenom</th>
                      <th>email</th>
                      <th>telephone</th>
                      <th>message</th>
                      <th>status</th>
                      <th>date</th>
                      <th>time</th>
                      

                    </tr>
                  </thead>
                  <tbody>
                  <?php
                     while($row=mysqli_fetch_assoc($reponse)){
                    ?>
                    <tr>
                      <td><?php  echo $row['id']  ?></td>
                      <td><?php  echo $row['nom'] ?></td>
                      <td><?php  echo $row['prenom']?> </td>
                      <td><?php  echo $row['email'] ?></td>
                      <td><?php  echo $row['telephone'] ?></td>
                      <td><?php echo $row['messageko'] ?></td>
                      <td><?php  echo $row['Statut'] ?></td>
                      <td><?php  echo $row['date'] ?></td>
                      <td><?php  echo $row['heure'] ?></td>
                    </tr>
                    <?php }?>
                    
                                      </tbody>

              </table>
            

        </div>
      </section>
    </section>
  </div>

</body>
</html>
