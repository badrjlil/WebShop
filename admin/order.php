<?php
    require_once("../connexion.php");
    $num_commande=$_GET['num'];
    $sql="SELECT * FROM Commandes WHERE num = $num_commande";
    $query=mysqli_query($connexion,$sql);
    $commandes=mysqli_fetch_assoc($query);

    $user_id=$commandes['idClient'];
    $sql="SELECT * FROM Clients WHERE idClient = $user_id";
    $query=mysqli_query($connexion,$sql);
    $client=mysqli_fetch_assoc($query);

    
    $adresse_id=$commandes['adresse_id'];
    $sql="SELECT * FROM Adresses WHERE id = $adresse_id";
    $query=mysqli_query($connexion,$sql);
    $adresse=mysqli_fetch_assoc($query);
?>


<!Doctype HTML>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../css/dashboard.css" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
    <script src="../js/admin.js" defer></script>
</head>


<body>


</body>
<?php include '../comp/admin_header.php';  ?>

<section class="core">
        <div class="core-item">
            <form action="update_commande.php" method="post">
              <div style="text-align:center;">
                <h2>Commande #<?php echo sprintf('%05d', $commandes['num'] ) ?></h2>
                <h4>Status de commande:</h4>
                <select id="selectElement" name="status">
                  <option value="En attente">En attente</option>
                  <option value="Expedie">Expédié</option>
                  <option value="Annule">Annulé</option>
                  </select> 
              </div>
            <div id="geninfo">  
              <div>
                <h4>Date de la commande:</h4>
                <p><?php echo $commandes['date'] ?></p>
                <h4>Nom d'utlisateur:</h4>
                <p><?php echo $client['prenom'] . " " . $client['nom'] ?></p>
                <h4>Email adresse:</h4>
                <p><?php echo $client['email'] ?></p>
                
                
              </div>
              <div>
              <h4>Nom complet:</h4>
                <p><?php echo $adresse['prenom'] . " " . $adresse['nom'] ?></p>
                <h4>Adresse:</h4>
                <p><?php echo $adresse['adresse'] ?></p>
                <h4>Téléphone</h4>
                <p><?php echo "+212 " . substr_replace($adresse['telephone'], '-', 3, 0) ?></p>

                
              </div>
              

              <div>
                <h4>Ville:</h4>
                <p><?php echo $adresse['ville'] ?></p>
                <h4>Région:</h4>
                <p><?php echo $adresse['region'] ?></p>
                <h4>Code postal</h4>
                <p><?php echo $adresse['zip'] ?></p>
                
              </div>
            </div>


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
                    $total=0;
                    while($produit=mysqli_fetch_assoc($produits_query)){
                      $produit_id=$produit['noArticle'];
                      $sql="SELECT * FROM Articles WHERE noArticle = $produit_id";
                      $query=mysqli_query($connexion,$sql);
                      $produit_info=mysqli_fetch_assoc($query);
                      $sql="SELECT photo1 FROM Photos WHERE noArticle = $produit_id";
                      $query=mysqli_query($connexion,$sql);
                      $produit_photo=mysqli_fetch_assoc($query);
                    ?>
                    <tr>
                      <td><img src="<?php echo "../" . $produit_photo['photo1'] ?>" style="height: 70px;"></td>
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
                    
                    <div id="total">
                    <h4>Total</h4>
                    <p><?php echo number_format($total, 2, ',', ' ')  . " MAD"  ?></p>
                    <input type="submit" value="Valider">
                    </div>
                    
            </form>
            <script>
                document.getElementById("selectElement").value = "<?php echo $commandes['status'] ?>";
            </script>

        </div>
      </section>

</body>
</html>