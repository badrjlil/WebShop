<?php
  require_once("../connexion.php");
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

<?php include '../comp/admin_header.php';  ?>



    <section class="main">
      <div class="main-top">
        <h1>Ajouter un produit</h1>
        <i class="fas fa-user-cog"></i>
      </div>
      

      <section class="core">
        <div class="core-item">
          <form action="ajouter.php" method="post"  enctype="multipart/form-data">
            <label>Titre</label>
            <input id="test" name="designation" type="text">
            <br>
            <div id="geninfo">
              <div id="catg">
                <label>Categorie</label>
                <select name="idCategorie" id="Categ">
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
              </div>
              <div id="prix">
                <label>Prix</label>
                <input type="text" id="test" name="prix">
              </div>
              <div id="qte">
                  <label>Quantité</label>
                  <input name="quantite" type="text" id="test">
              </div>
            </div>            
            <label>Description</label>
            <br>
            <textarea name="description" id="test" cols="60" rows="10"></textarea>
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
