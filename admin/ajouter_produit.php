<?php
  require_once("connexion.php");
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
        <h1>Ajouter un produit</h1>
        <i class="fas fa-user-cog"></i>
      </div>
      

      <section class="core">
        <div class="core-item">
          <form action="ajouter.php" method="post"  enctype="multipart/form-data">
            <style>
              #test{
                border: black 1px solid;
              }
            </style>
            <label>Titre</label>
            <input id="test" name="designation" type="text">
            <br>
            <label>Description</label>
            <br>
            <textarea name="description" id="test" cols="60" rows="10"></textarea>
            <br>
            <label>Catégorie</label>
            <br>
            <select name="idCategorie" id="test">
              <?php
                $sql="SELECT * FROM SubCategories";
                $query=mysqli_query($connexion,$sql);
                while($categorie=mysqli_fetch_assoc($query)){;
              ?>
              <option value="<?php echo $categorie['idCategorie'] ?>"><?php echo $categorie['nomCategorie'] ?></option>
              <?php
                }
              ?>
            </select>
            <label>Prix</label>
            <input type="text" id="test" name="prix">
            <label>Quantité</label>
            <input name="quantite" type="text" id="test">
            <br>
            <label>Photos</label>
            <div class="images_container">
              <?php
                for ($i = 1; $i <= 6; $i++) {
              ?>
              <div class="box">
                <img id="selected-image-<?php echo $i?>" class="images" src="" width="100px" >
                <input id="image-input-<?php echo $i?>" type="file" name="photo<?php echo $i ?>"/>
              </div>
              <?php
                }
              ?>
            </div>
            <script>
            for (let i = 1; i <= 6; i++) {
              const input = document.getElementById(`image-input-${i}`);
              const image = document.getElementById(`selected-image-${i}`);
          
              input.addEventListener("change", function () {
                const reader = new FileReader();
                reader.onload = function () {
                  image.src = reader.result;
                };
                reader.readAsDataURL(input.files[0]);
              });
            }
            </script>
            <input type="submit" value="Enregistrer">
          </form>
        </div>
      </section>
    </section>
  </div>

</body>
</html>
