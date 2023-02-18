<?php
  require_once("../connexion.php");
  if(isset($_GET['keyword'])){
    $keyword=$_GET['keyword'];
    $sql="SELECT * FROM Articles WHERE designation like '%$keyword%' AND status = 'active' ORDER BY noArticle DESC";
  }else{
    $sql="SELECT * FROM Articles WHERE status = 'active' ORDER BY noArticle DESC";
  }
  
  $articles_query=mysqli_query($connexion,$sql);
?>

<!Doctype HTML>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../css/dashboard.css" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
    <script src="script.js" defer></script>
</head>


<body>


</body>
<?php include '../comp/admin_header.php';  ?>
    <div id="searchbar" >
        <form action="" action="get">
          <div style="display:inline-block;"><input type="text" name="keyword" value="<?php echo $keyword?>"></div>
          <div style="display:inline-block;"><input id="search-btn" type="submit" value="Rechercher"></div>
        </form>
    </div>

    <br>

		<div class="box-8">
    <button style="margin:10px; padding: 10px 50px" onclick="window.location.href='add_product.php'">Ajouter produit</button>

    
		<div class="content-box">
			<p>Les Commandes</p>
			<br/>
      <table align="center">
        <tr>
            <th>Photo</th>
            <th>Nom</th>
            <th>Quantité</th>
            <th>Prix</th>
            <th>Catégorie</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        <?php
              $lines=0;
              while($article=mysqli_fetch_assoc($articles_query)){
                $lines++;
              ?>
              <tr>
                <?php
                $no_produit=$article['noArticle'];
                $sql="SELECT photo1 FROM Photos WHERE noArticle = $no_produit";
                $query=mysqli_query($connexion,$sql);
                $photo_produit=mysqli_fetch_assoc($query);
                ?>
                <td><img src="<?php echo "../" . $photo_produit['photo1'] ?>" style="height: 70px;"></td>
                <td><?php echo $article['designation'] ?></td>
                <td><?php echo $article['quantite'] ?></td>
                <td><?php echo number_format($article['prix'], 2, ',', ' ')  . " MAD" ?></td>
                <?php
                  $idSubCategorie=$article['idCategorie'];
                  $sql="SELECT * FROM SubCategories WHERE idCategorie = $idSubCategorie";
                  $query=mysqli_query($connexion,$sql);
                  $sub_categorie=mysqli_fetch_assoc($query);
                  $idCategorie=$sub_categorie['categorie'];
                  $sql="SELECT nomCategorie FROM Categories WHERE idCategorie = $idCategorie";
                  $query=mysqli_query($connexion,$sql);
                  $categorie=mysqli_fetch_assoc($query);

                ?>
                <td><?php echo $categorie['nomCategorie'] . "/" . $sub_categorie['nomCategorie'] ?></td>
                <td><?php echo date("d-m-Y", strtotime($article['date'])) ?></td>
                
                <td><a style="text-decoration: none;" href="modify_product.php?noArticle=<?php echo $article['noArticle'] ?>"> <i id="edit-icon"  class="fa fa-pencil" aria-hidden="true"></i>&nbsp;&nbsp;</a>
                <a href="delete.php?noArticle=<?php echo $article['noArticle'] ?>"> <i id="edit-icon"  class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
              </tr>
              <?php 
              } 
              ?>     
      </table>
		</div>
	</div>
	</div>
    
</html>