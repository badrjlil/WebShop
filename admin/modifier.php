<?php
  require_once("../connexion.php");
  $no_produit=$_GET['noArticle'];
  $sql="SELECT * FROM Articles WHERE noArticle = $no_produit";
  $query=mysqli_query($connexion,$sql);
  $article=mysqli_fetch_assoc($query);
  $categorie_id=$article['idCategorie'];
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
        <h1>Modifier le produit</h1>
        <i class="fas fa-user-cog"></i>
      </div>
      

      <section class="core">
        <div class="core-item">
          <form action="update.php" method="post"  enctype="multipart/form-data">
            <label>Titre</label>
            <input type="hidden" name="noArticle" value="<?php echo $no_produit ?>">
            <input  name="designation" type="text"  value="<?php echo $article["designation"] ?>">
            <br>
            <div id="geninfo">
              <div id="catg">
                <label>Categorie</label>

                <select name="idCategorie" id="Categ">
                  <?php
                    $sql="SELECT * FROM SubCategories";
                    $query=mysqli_query($connexion,$sql);
                    while($categorie=mysqli_fetch_assoc($query)){
                  ?>
                  <option value="<?php echo $categorie['idCategorie'] ?>" <?php if($categorie['idCategorie']==$categorie_id){ echo "selected";} ?> ><?php echo $categorie['nomCategorie'] ?></option>
                  <?php
                    }
                  ?>
                </select>
              </div>
              <div id="prix">
                <label>Prix</label>
                <input type="text"  name="prix" value="<?php echo $article["prix"] ?>">
              </div>
              <div id="qte">
                <label>Quantité</label>
                <input name="quantite" type="text"  value="<?php echo $article["quantite"] ?>">
              </div>
            </div>
            <label>Description</label>
            <br>
            <textarea name="description"  cols="60" rows="10"><?php echo $article["description"] ?></textarea>
            
            
            <br>


            <label>Photos</label>
            <div class="images_container">
              <?php
                $sql="SELECT * FROM Photos WHERE noArticle=$no_produit";
                $query=mysqli_query($connexion,$sql);
                $produit_photos=mysqli_fetch_assoc($query);
                for ($i = 1; $i <= 6; $i++) {
              ?>
              <div class="box">
                <img id="selected-image-<?php echo $i?>" class="images" src="<?php echo "../" . $produit_photos["photo" . $i] ?>" width="100px" >
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
