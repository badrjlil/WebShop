<?php
 require_once("../connexion.php");
 $user_id=$_POST['user_id'];
 $sql="SELECT * FROM Panier WHERE idClient = $user_id ";
 $panier_query=mysqli_query($connexion,$sql);
 //$panier=mysqli_fetch_assoc($query);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="checkout.css">
</head>
<body>
<div class="container">
  <div class="title">
      <h2>Commander</h2>
  </div>
<div class="d-flex">
  <form action="valider_commande.php" method="post" id="valider">
    <div style="text-align:center; margin-top: 5%">
      <label>
        Entrer votre informations: 
      </label>
      <label>
        <input type="text" placeholder="Prénom" name="prenom">
      </label>
      <label>
        <input type="text" placeholder="Nom" name="nom">
      </label>
      <label>
        <input type="text" name="adresse" placeholder="Numéro de maison et nom de la rue..." required>
      </label>
      <label>
        <input type="text"placeholder="Ville" name="ville"> 
      </label>
      <label>
        <input type="text" placeholder="Région" name="region"> 
      </label>
      <label>
        <input type="text" placeholder="Code postal" name="zip"> 
      </label>
      <label>
        <input type="tel" placeholder="Téléphone" name="telephone"> 
      </label>
    </div>
          <input type="hidden" id="total" name="total">
  </form>
  <div class="Yorder">
    <table>
      <tr>
        <th colspan="2">Votre commande</th>
      </tr>
      <tr>
        <td>
          <?php
            $total=0;
            while($produit=mysqli_fetch_assoc($panier_query)){
              $no_produit=$produit['noArticle'];
              $sql="SELECT designation, prix FROM Articles WHERE noArticle = $no_produit";
              $query=mysqli_query($connexion,$sql);
              $produit_info=mysqli_fetch_assoc($query);
              echo substr($produit_info['designation'], 0, 20) . "... x " . $produit['qts'] . "<br><br>";
              $total+=$produit_info['prix'] * $produit['qts'];
            }
          ?>
        </td>
        <td><?php echo number_format($total,2,',',' ')  ?> MAD</td>
      </tr>
      <tr>
        <td>Livraison</td>
        <td>Livraison gratuit</td>
      </tr>
      <tr>
        <td>Total</td>
        <td><?php echo number_format($total,2,',',' ')  ?> MAD</td>
      </tr>
      
    </table><br>
    <div>
      <input type="radio" name="dbt" value="cd" checked> Paiement à la livraison
    </div>
    <button type="button" onclick="document.getElementById('total').value = <?php echo $total; ?> ;document.getElementById('valider').submit();">Passer la commande</button>
  </div><!-- Yorder -->
 </div>
</div>
</body>
</html>