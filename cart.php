<?php
    require_once("connexion.php");
    session_start();
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];


      
        if(isset($_POST['noArticle'])){
            $no_produit=$_POST['noArticle'];
            $sql="DELETE FROM Panier WHERE noArticle = $no_produit";
            $query=mysqli_query($connexion,$sql);
        }

        if(isset($_POST['passer'])){
            echo $_POST['user_id'];
        }

      $sql="SELECT * FROM Panier WHERE idClient = $user_id";
      $panier_query=mysqli_query($connexion,$sql);
      $nbr_produits=mysqli_num_rows($panier_query);
    }

    
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <section id="header">
        <a href="#"><img src="images/logo.png" class="logo" alt=""></a>
        <div>
            <ul id="navbar">
                <li><a href="index.html">Accueil</a></li>
                <li><a href="shop.html">Shop</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li id="lg-bag"><a href="#" class="active"><i class="far fa-shopping-bag"></i></a></li>
                <li><a href="#"><i class="fa fa-user"></i></a></li>
                <a id="close" href="#"><i class="far fa-times"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href="cart.html"><i class="far fa-shopping-bag"></i></a>
            <i id="bar" class="fas fa-outdent"></i>

        </div>
    </section>

    
    <?php
        if($nbr_produits > 0){

        
    ?>

    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>RETIRER</td>
                    <td>Image</td>
                    <td>PRODUIT</td>
                    <td>Prix</td>
                    <td>Quantite</td>
                    <td>TOTAL</td>
                </tr>
            </thead>

            <tbody>
                <?php
                $total_net=0;
                while($panier_article=mysqli_fetch_assoc($panier_query)){
                    $no_produit=$panier_article['noArticle'];
                    $sql="SELECT * FROM Articles WHERE noArticle = $no_produit";
                    $query=mysqli_query($connexion,$sql);
                    $article=mysqli_fetch_assoc($query);
                    
                    $sql="SELECT photo1 FROM Photos WHERE noArticle = $no_produit";
                    $query=mysqli_query($connexion,$sql);
                    $photo_produit=mysqli_fetch_assoc($query);
                    
                ?>
                <tr>
                    <form action="" method="post">
                    <td><input type="submit" value="X" id="retirer"><input type="hidden" name="noArticle" value="<?php echo $no_produit ?>"></td>
                    <td><img src="<?php echo $photo_produit['photo1']?>" ></td>
                    <td><?php echo $article['designation']?></td>
                    <td><?php echo $article['prix']?></td>
                    <td><?php echo $panier_article['qts']?></td>
                    <td><?php echo ($article['prix']*$panier_article['qts'])?></td>
                    </form>
                </tr>
                <?php
                $total+=($article['prix']*$panier_article['qts']);
                }
                ?>
               
            </tbody>
        </table>
    </section>


    <section id="cart-add" class="section-p1">
        <div id="cuopon">
            <h3>Appliquer Coupon</h3>
            <div>
                <input type="text" name="" id="" placeholder="Enter Votre Coupon">
                <button class="normal">Appliquer</button>
            </div>
        </div>

        <div id="subtotal">
            <h3>Totaux du panier</h3>
            <table>
                <tr>
                    <td>Total du panier</td>
                    <td><?php echo $total . " MAD" ?></td>
                </tr>
                <tr>
                    <td>Livraison</td>
                    <td>Gratuit</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong><?php echo $total . " MAD" ?></strong></td>
                </tr>
            </table>
            <form action="checkout.php" method="post">
                <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                <input class="inp-normal" type="submit" name="passer" value="Passer à la caisse">
                <!--<button class="normal">Passer à la caisse</button>-->
            </form>
        </div>
    </section>
            
    <?php
        }else{
    ?>
        <p align="center" >Le panier est vide</p>

    <?php
        }
    ?>

    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="images/logo.png" alt="">
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
            <p style="color: white;">©2023 Online Ecommerce Shop</p>
        </div>
    </footer>


    

</body>

</html>