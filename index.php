
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <!-- <link rel="stylesheet" href="reset.css"> buat reset css -->
    <link rel="shortcut icon" type="image/jpg" href="./img/apple-logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"
        crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    
</head>

<body>
    <!-- Bagian header-->
<?php
    include 'comp/user_header.php';
?>
    <!-- header -->

    <main>

        <!-- Bagian content atas -->


        <div class="container" style="margin-top: 90px">
            <div class="contents">
                <div class="image-container" onclick="location.href='produit.php?noArticle=84';" style="cursor: pointer;">
                    <div class="iphone-12">
                        <div class="title">
                            <h1>iPhone 14</h1>
                            <p>Passez vite.</p>
                        </div>
                        <div class="cta-links">
                            
                            <a href="#" class="buy-link">Acheter ></a>
                        </div>
                    </div>
                </div>
                <div class="image-container" onclick="location.href='produit.php?noArticle=80';" style="cursor: pointer;">
                    <div class="iphone-12-pro">
                        <div class="title">
                            <h1>iPhone 14 Pro</h1>
                            <p>C'est une année bissextile.</p>
                        </div>
                        <div class="cta-links">
                            <a href="#" class="buy-link">Acheter ></a>
                        </div>
                    </div>
                </div>

        <div class="title">
                    <h1 class="hello">Fitness+</h1>
                    <p class="A">Une nouvelle expérience de remise en forme pour tous.</p>
                    <div class="cta-links">
                        <a href="produit.php?noArticle=77" class="buy-link">Afficher plus ></a>
                    </div>
                <div class="image-container">
                <div class="fitness" onclick="location.href='https:https://www.apple.com/apple-fitness-plus/';" style="cursor: pointer;"></div>    
                    </div>
</div>
</div>

            </div>
        </div>


        <ul class="flex-list">
            <li class="li1 content">

                <div class="theme-dark container-main"
                    onclick="location.href='produit.php?noArticle=77';" style="cursor: pointer;">
                    <div class="unit-copy-wrapper">
                        <img class="apple-watch-logo" src="./img/apple-watch-logo.png" alt="apple-watch-logo">
                        <h2 class="headline">L'avenir de la santé est à votre poignet.</h2>
                    </div>
                    <div class="cta-links">
                        <a href="https://www.apple.com/shop/buy-watch/apple-watch" class="buy-link">Acheter ></a>
                    </div>
                    <div class="unit-image">
                        <figure>
                            <img src="./img/apple-watch-6.png" alt="apple-watch">
                        </figure>
                    </div>
                </div>
            </li>

            <li class="li2 content">

                <div class="theme-light container-main" onClick="location.href='produit.php?noArticle=82';"
                    style="cursor: pointer;">
                    <div class="unit-copy-wrapper">
                        <img class="apple-watch-logo" src="./img/ipad-air-logo.png" alt="">
                        <h2 class="headline">Puissant. Coloré. Merveilleux.</h2>
                    </div>
                    <div class="cta-links">
                        <a href="" class="buy-link">Acheter ></a>
                    </div>
                    <div class="unit-image">
                        <figure>
                            <img src="./img/ipad-air.png" alt="ipad-air" style="width: 70%;">
                        </figure>
                    </div>
                </div>
            </li>

      

            
            
        </ul>
    </main>

    <!-- Bagian footer-->
    <footer class="section-p1">
        <div class="col"  style="color: white;">
            <img class="logo" src="img/logo.png" alt="">
            <h4>Contact</h4>
            <p  style="color: white;"><strong>Address: </strong> IGA - Belvédère, Casablanca, Maroc</p>
            <p  style="color: white;"><strong>Téléphoner:</strong> +212 6 12 34 56 78 </p>
            <p  style="color: white;"><strong>Heures:</strong> 9:00 - 18:00, Lun - Sam</p>
            <div class="follow">
                <h4>Suivez-nous</h4>
                <div class="icon" >
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
            <a href="#">À propos de nous</a>
            <a href="#">Informations de livraison</a>
            <a href="#">Politique de confidentialité</a>
            <a href="#">Termes et conditions</a>
            <a href="#">Contactez-nous</a>
        </div>

        <div class="col" style="color: white;">
            <h4>Mon Compte</h4>
            <a href="#">S'identifier</a>
            <a href="#">Voir le panier</a>
            <a href="#">Ma Liste d'envies</a>
            <a href="#">Suivre ma commande</a>
            <a href="#">Aider</a>
        </div>

        <div class="col install" style="color:white">
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
            <p style="color: white;">©2023 Online Ecommerce Shop</p>
        </div>
    </footer>

    

</body>
</html>