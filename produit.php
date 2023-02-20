<?php
	require_once("connexion.php");
	$noArticle=$_GET['noArticle'];
	$sql="select * from Articles where noArticle=$noArticle";
	$query=mysqli_query($connexion,$sql);
	$article=mysqli_fetch_assoc($query);
    $sql="select * from Photos where noArticle=$noArticle";
    $query=mysqli_query($connexion,$sql);
    $articlesPhotos=mysqli_fetch_assoc($query);
    
    include 'add_to_cart.php';

    
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $article['designation'] ?></title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style_old.css">
</head>

<body>
    <?php
        include 'comp/user_header.php';
    ?>

    <section style="margin-top: 90px" id="prodetails" class="section-p1">
        <div class="single-pro-image">
            <img src="<?php echo $articlesPhotos['photo1'] ?>" width="700px" id="MainImg" alt="">

            <div class="small-img-group">
            <?php for($i=1; $i<=6; $i++){
                if(strlen($articlesPhotos["photo$i"])){
            ?>
                <div class="small-img-col">
                    <img src="<?php echo $articlesPhotos["photo$i"] ?>" width="100%" class="small-img" alt="">
                </div>
            <?php
                }
            }
            ?>
            </div>
        </div>

        <div class="single-pro-details">
            <?php
            $articleCatId=$article['idCategorie'];
            $sql="select * from SubCategories where idCategorie = $articleCatId ";
            $query=mysqli_query($connexion,$sql);
            $subCategorie=mysqli_fetch_assoc($query); 
            $subCategorieId= $subCategorie['categorie'];
            $sql="select * from Categories where idCategorie = $subCategorieId";
            $query=mysqli_query($connexion,$sql);
            $mainCategorie=mysqli_fetch_assoc($query); 

            ?>
            <h6><?php echo $mainCategorie['nomCategorie'] . "/" . $subCategorie['nomCategorie'] ?></h6>
            <h4><?php echo $article['designation'] ?></h4>
            <h2><?php echo $article['prix'] . " MAD" ?></h2>
            
            <form action="" method="post">
                <input type="hidden" name="noArticle" value="<?php echo $article['noArticle'] ?>">
                
                <input type="number" value="1" max="<?php echo $article['quantite'] ?>" min="1"  name="qts">
                <button class="normal" type="submit" name="add_to_cart">Ajouter Au Panier</button>
            </form>
            <h4>Description</h4>
            <span><?php echo $article['description'] ?></span>
        </div>
    </section>



    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="img/logo.png" alt="">
            <h4>Contact</h4>
            <p><strong>Address: </strong> ain sebaa, casablanca, maroc</p>
            <p><strong>Téléphoner:</strong> +212 6 84 06 35 95 </p>
            <p><strong>Heures:</strong> 9:00 - 18:00, Lun - Sam</p>
            <div class="follow">
                <h4>Suivez-nous</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest-p"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>

        <div class="col">
            <h4>About</h4>
            <a href="#">About Us</a>
            <a href="#">Informations de livraison</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">Contact Us</a>
        </div>

        <div class="col">
            <h4>Mon Compte</h4>
            <a href="#">Sign In</a>
            <a href="#">Voir Le Panier</a>
            <a href="#">Ma Liste D'envies</a>
            <a href="#">Suivre Ma Commande</a>
            <a href="#">Aider</a>
        </div>

        <div class="col install">
            <h4>Installer L'application</h4>
            <p>Depuis App Store ou Google Play</p>
            <div class="row">
                <img src="img/pay/app.jpg" alt="">
                <img src="img/pay/play.jpg" alt="">
            </div>
            <p>Passerelles de paiement sécurisées</p>
            <img src="img/pay/pay.png" alt="">
        </div>

        <div class="copyright">
            <p style="color: white;">©2023 Online E-Commerce Store</p>
        </div>
    </footer>

    <script>
        var MainImg = document.getElementById("MainImg");
        var smallimg = document.getElementsByClassName("small-img");
            
        smallimg[0].onclick = function() {
            MainImg.src = smallimg[0].src;
        }
        smallimg[1].onclick = function() {
            MainImg.src = smallimg[1].src;
        }
        smallimg[2].onclick = function() {
            MainImg.src = smallimg[2].src;
        }
        smallimg[3].onclick = function() {
            MainImg.src = smallimg[3].src;
        }
        smallimg[4].onclick = function() {
            MainImg.src = smallimg[4].src;
        }
        smallimg[5].onclick = function() {
            MainImg.src = smallimg[5].src;
        }
    </script>


    <script src="script.js"></script>
</body>

</html>
