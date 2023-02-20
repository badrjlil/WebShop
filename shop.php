<?php
    require_once("connexion.php");

    if(isset($_GET['min']) && isset($_GET['max']) && isset($_GET['keyword'])){
        $min=$_GET['min'];
        $max=$_GET['max'];
        $keyword=$_GET['keyword'];
        $sql="SELECT * FROM Articles WHERE prix >= $min and prix <= $max AND designation LIKE '%$keyword%' AND status = 'active'     ";
    }
    elseif(isset($_GET['categorie'])){
        $id=$_GET['categorie'];
        $sql="SELECT * FROM Articles a, SubCategories c, Categories m WHERE a.idCategorie = c.idCategorie AND c.categorie = m.idCategorie AND m.idCategorie = $id AND quantite > 0 AND a.status = 'active'";
        
    }
    elseif(isset($_GET['subcategorie'])){
        $id_categorie=$_GET['subcategorie'];
        $sql="SELECT * FROM Articles WHERE idCategorie = $id_categorie";
        
    }elseif(isset($_GET['min']) && isset($_GET['max'])){
        $min=$_GET['min'];
        $max=$_GET['max'];
        $sql="SELECT * FROM Articles WHERE prix >= $min and prix <= $max AND status = 'active'";
    }elseif(isset($_POST['keyword'])){
        $keyword=$_POST['keyword'];
        $sql="SELECT * FROM Articles WHERE designation LIKE '%$keyword%' AND status = 'active'";
    }else{
        $sql="SELECT * FROM Articles WHERE quantite > 0 AND status = 'active' ";
        
    }
    
        
    $resultat=mysqli_query($connexion,$sql);
    $sql="SELECT * FROM Categories";
    $categories=mysqli_query($connexion,$sql);
?>

<html>
    <head>
        
        <title>WebShop - Produits</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link rel="stylesheet" href="style.css">
        <script src="script.js" defer></script>
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    </head>

    <body>

        <?php
        include 'comp/user_header.php';
        ?>
    <section style="padding-top:80px">
        <div class="left-div">
            <h3>Categories: </h3>
            <ul>
                <?php
                while ($row = mysqli_fetch_assoc($categories)) {
                    echo '<li><a href="shop.php?categorie=' .$row['idCategorie'] . '" class="categories">' . $row['nomCategorie'] . '</a><ul>';
                    $nomCategorie=$row['idCategorie'];
                    $idCat = $row['idCategorie'];
                    $sql = "select * from SubCategories where categorie = $idCat";
                    $subCategories=mysqli_query($connexion,$sql);
                    while ($categorie = mysqli_fetch_assoc($subCategories)){
                        echo '<li><a href="shop.php?subcategorie=' . $categorie['idCategorie'] . '" class="categories">' . $categorie['nomCategorie'] . '</a></li>';
                    }
                    echo "</ul></li>";
                }
                ?>
            </ul>

            <h4>Prix :</h4>
                <form id="myForm" method="get" action="" onsubmit="DoSubmit();">
                    <p>Min</p>
                    <input  type="range" value="<?php if(isset($_GET['min'])){$min = $_GET['min']; echo $min;}else{echo 0;} ?>" min="0" max="40000" id="range-button-1">
                    <input class="center" style="width:100px" type="text" name="min" value="<?php if(isset($_GET['min'])){$min = $_GET['min']; echo $min;}else{echo 0;} ?>" id="range-value-1">
                    
                    <p>Max</p>
                    <input type="range" value="<?php if(isset($_GET['max'])){$min = $_GET['max']; echo $min;}else{echo 50000;} ?>" min="0" max="50000" id="range-button-2">
                    <input class="center" style="width:100px" type="text" name="max" value="<?php if(isset($_GET['max'])){$min = $_GET['max']; echo $min;}else{echo 50000;} ?>" id="range-value-2">
                    <br>
                    <br>
                    <input id="filter" type="submit" value="Ok" >
                    <input type="hidden" name="keyword" value="iphone">

                    <script>
                        

                    </script>
                </form>
        </div>
        
        <section class="Products" >
            <div class="right-div">
                    <?php
                        $linenbr=0;
                        while($ligne=mysqli_fetch_assoc($resultat)){
                            $no_produit=$ligne['noArticle'];
                            $sql="SELECT photo1 FROM Photos WHERE noArticle =  $no_produit";
                            $query=mysqli_query($connexion,$sql);
                            $produit_photo=mysqli_fetch_assoc($query);
                    ?>

                    <div id="Product" >
                        <div id="ProductContainer">
                            <div id="Image">
                                <a href="produit.php?noArticle=<?php echo $ligne['noArticle']; ?>"> <img src="<?php echo $produit_photo['photo1'] ?>" width="300px"></a>
                            </div>
                            <div class="title_container">
                                <a id="title" href="produit.php?noArticle=<?php echo $ligne['noArticle']; ?>" ><?php echo $ligne['designation'] ?></a> 
                            </div>
                            <h4><?php echo number_format($ligne['prix'],2,',',' ') ?> MAD</h4> 
                            <button id="BuyButton" onclick="window.location.href='produit.php?noArticle=<?php echo $ligne['noArticle']; ?>'" >Afficher plus</button>
                        </div>
                        </div>
                    <?php
                        $linenbr+=1;
                        if($linenbr%4==0){
                            //echo'</div>';
                            //echo'<div class="right-div">';
                        }
                    ?>
                    <?php
                    }
                    ?>
            </div>
        </section>
    </section>
    </body>
</html>
