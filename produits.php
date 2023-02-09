<?php
    require_once("connexion.php");

    if(isset($_POST['keyword'])){
        $keyword=$_POST['keyword'];
        $sql="SELECT * FROM Articles WHERE designation LIKE '%$keyword%'";
    }
    elseif(isset($_GET['categorie'])){
        $id=$_GET['categorie'];
        $sql="SELECT * FROM Articles a, SubCategories c, Categories m WHERE a.idCategorie = c.idCategorie AND c.categorie = m.idCategorie AND m.idCategorie =  $id";
        
    }
    elseif(isset($_GET['subcategorie'])){
        $id_categorie=$_GET['subcategorie'];
        $sql="SELECT * FROM Articles WHERE idCategorie = $id_categorie";
        
    }elseif(isset($_GET['min']) && isset($_GET['max'])){
        $min=$_GET['min'];
        $max=$_GET['max'];
        $sql="SELECT * FROM Articles WHERE prix >= $min and prix <= $max";
    }else{
        $sql="SELECT * FROM Articles";
    }
        
    $resultat=mysqli_query($connexion,$sql);
    $sql="SELECT * FROM Categories";
    $categories=mysqli_query($connexion,$sql);
?>

<html>
    <head>
        
        <title>Listes des produits</title>
        <link rel="stylesheet" href="produits.css">
        <script src="script.js"></script>
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    </head>

    <body>
        <section id="header">
            <a href="#"><img src="images/logo.png" class="logo" alt=""></a>
            <div>
                <form action="" method="post">
                <input type="text" class="form-input" placeholder="Rechercher" value="<?php if(isset($_POST['keyword'])){ echo $keyword;} ?>" name="keyword">
                <input type="submit" class="form-submit" value="Chercher">
                </form>
                
            </div>
            <div>
                <ul id="navbar">
                    <li><a class="active" href="index.html">Accueil</a></li>
                    <li><a href="produits.php">Produits</a></li>
                    <li><a href="about.html">À propos de nous</a></li>
                    <li><a href="contact.html">Contactez-nous</a></li>
                    <li id="lg-bag"><a href="card.html"><i class="far fa-shopping-bag"></i></a></li>
                    <a href="#" id="close"><i class="far fa-times"></i></a>
                </ul>
            </div>
            <div id="mobile">
                <a href="cart.html"><i class="far fa-shopping-bag"></i></a>
                <i id="bar" class="fas fa-outdent"></i>
            </div>
        </section>

        <div class="left-div">
            <h3>Categories: </h3>
            <ul>
                <?php
                while ($row = mysqli_fetch_assoc($categories)) {
                    echo '<li><a href="produits.php?categorie=' .$row['idCategorie'] . '" class="categories">' . $row['nomCategorie'] . '</a><ul>';
                    $nomCategorie=$row['idCategorie'];
                    $idCat = $row['idCategorie'];
                    $sql = "select * from SubCategories where categorie = $idCat";
                    $subCategories=mysqli_query($connexion,$sql);
                    while ($categorie = mysqli_fetch_assoc($subCategories)){
                        echo '<li><a href="produits.php?subcategorie=' . $categorie['idCategorie'] . '" class="categories">' . $categorie['nomCategorie'] . '</a></li>';
                    }
                    echo "</ul></li>";
                }
                ?>
            </ul>
            
            <h4>Prix :</h4>
                <form method="get" action="">
                    <p>Min</p>
                    <input  type="range" value="<?php if(isset($_GET['min'])){$min = $_GET['min']; echo $min;}else{echo 0;} ?>" min="0" max="40000" id="range-button-1">
                    <input class="center" style="width:100px" type="text" name="min" value="<?php if(isset($_GET['min'])){$min = $_GET['min']; echo $min;}else{echo 0;} ?>" id="range-value-1">
                    
                    <p>Max</p>
                    <input type="range" value="<?php if(isset($_GET['max'])){$min = $_GET['max']; echo $min;}else{echo 50000;} ?>" min="0" max="50000" id="range-button-2">
                    <input class="center" style="width:100px" type="text" name="max" value="<?php if(isset($_GET['max'])){$min = $_GET['max']; echo $min;}else{echo 50000;} ?>" id="range-value-2">
                    <br>
                    <br>
                    <input id="filter" type="submit" value="Ok" >

                    <script>
                        const rangeButton1 = document.getElementById('range-button-1');
                        const rangeButton2 = document.getElementById('range-button-2');
                        const rangeValue1 = document.getElementById('range-value-1');
                        const rangeValue2 = document.getElementById('range-value-2');
                        rangeButton1.addEventListener('input', function() {
                            rangeValue1.value = rangeButton1.value;
                        });
                        rangeButton2.addEventListener('input', function() {
                            rangeValue2.value = rangeButton2.value;
                        });
                        rangeValue1.addEventListener('input', function() {
                            rangeButton1.value = rangeValue1.value;
                        });
                        rangeValue2.addEventListener('input', function() {
                            rangeButton2.value = rangeValue2.value;
                        });

                    </script>
                </form>
        </div>
        
        <section id="resultproducts" class="right-div">
            <table>
                <tr id="test">
                    <?php
                        $linenbr=0;
                        while($ligne=mysqli_fetch_assoc($resultat)){
                        $idCategorie=$ligne['idCategorie'];
                        $sql="SELECT * FROM Categories WHERE idCategorie=$idCategorie";
                        $query=mysqli_query($connexion,$sql);
                        $ligne2=mysqli_fetch_assoc($query);
                    ?>

                    <td style="margin: 10px">
                    <div id="Product" >
                        <div id="ProductContainer">
                            <div id="Image">
                                <a href="produit.php?noArticle=<?php echo $ligne['noArticle']; ?>"> <img src="<?php echo $ligne['photo'] ?>" width="300px"></a>
                            </div>
                            <a href="produit.php?noArticle=<?php echo $ligne['noArticle']; ?>" id="title"><?php echo $ligne['designation'] ?></a> 
                            <h4 style="margin-left:15px"><?php echo $ligne['prix']?> MAD</h4> 
                            <button id="BuyButton" onclick="window.location.href='produit.php?noArticle=<?php echo $ligne['noArticle']; ?>'" >Afficher plus</button>
                        </div>
                        </div>
                    </td>
                    <?php
                        $linenbr+=1;
                        if($linenbr%4==0){
                            echo'</tr>';
                            echo'<tr>';
                        }
                    ?>
                    <?php
                    }
                    ?>
                </tr>
            </table>
        </section>
    </body>
</html>
