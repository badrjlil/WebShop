<?php
    require_once("connexion.php");
    $num_commande=$_GET['num'];
    $sql="SELECT * FROM Commandes WHERE num = $num_commande";
    $query=mysqli_query($connexion,$sql);
    $commandes=mysqli_fetch_assoc($query);
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
        <h1>détails de la commande</h1>
        <i class="fas fa-user-cog"></i>
      </div>
      <section class="core">
        <div class="core-item">
            <form action="valider.php" method="post">
                <h2>Commande #<?php echo sprintf('%05d', $commandes['num'] ) ?></h2>
                <h4>Date de la commande</h4>
                <p><?php echo $commandes['date'] ?></p>
                <h4>Status</h4>
                <select id="selectElement" name="status">
                    <option value="Pending">Pending</option>
                    <option value="Shipped">Shipped</option>
                    <option value="Canceled">Canceled</option>
                </select>
                <h4>Client</h4>
                <?php 
                    $id_client=$commandes['idClient'];
                    $sql="SELECT * FROM Clients WHERE idClient = $id_client";
                    $query=mysqli_query($connexion,$sql);
                    $client=mysqli_fetch_assoc($query);
                ?>
                <p><?php echo $client['prenom'] . " " . $client['nom'] ?></p>
                <h4>Adresse</h4>
                <p><?php echo $client['adresse'] ?></p>
                <h4>Téléphone</h4>
                <p><?php echo "+212 " . substr_replace($client['telephone'], '-', 3, 0) ?></p>
                <h4>Produits commandés</h4>
                
                

                <table class="table">
                  <thead>
                    <tr>
                      <th>Photo</th>
                      <th>Produit</th>
                      <th>Quantité</th>
                      <th>Prix</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql="SELECT * FROM Commande_details WHERE num = $num_commande";
                    $produits_query=mysqli_query($connexion,$sql);
                    //$produits_commande=mysqli_fetch_assoc($query);
                    //echo $produits_commande['noArticle'];
                    $total=0;
                    while($produit=mysqli_fetch_assoc($produits_query)){
                      $produit_id=$produit['noArticle'];
                      $sql="SELECT * FROM Articles WHERE noArticle = $produit_id";
                      $query=mysqli_query($connexion,$sql);
                      $produit_info=mysqli_fetch_assoc($query);
                    ?>
                    <tr>
                      <td><img src="<?php echo $produit_info['photo'] ?>" style="height: 70px;"></td>
                      <td><?php echo $produit_info['designation'] ?></td>
                      
                      <td><?php echo $produit['quantite'] ?></td>
                      <td><?php echo number_format($produit_info['prix'], 2, ',', ' ')  . " MAD"  ?></td>
                    </tr>
                    <?php 
                    $total=$total+($produit['quantite']*$produit_info['prix']);
                    } 
                    ?>
                  </tbody>
                  
              </table>
              <input type="hidden" name="num" value="<?php echo $commandes['num'] ?>">
                    <input type="submit" value="Valider">
                    <h4>Total</h4>
                    <p><?php echo number_format($total, 2, ',', ' ')  . " MAD"  ?></p>
            </form>
            <script>
                document.getElementById("selectElement").value = "<?php echo $commandes['status'] ?>";
            </script>

        </div>
      </section>
    </section>
  </div>

</body>
</html>
