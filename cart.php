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
    <title>Panier - Webshop</title>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <link rel="stylesheet" href="css/cart.css">
</head>

<body>
    <?php
        include 'comp/user_header.php';
    ?>

    
    <?php
        if($nbr_produits > 0){

        
    ?>

    <section style="margin-top:90px" id="cart" class="section-p1">
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
                    <form action="" method="post" id="form-<?php echo $no_produit ?>">
                        <!--<td><input type="submit" value="X" id="retirer"><input type="hidden" name="noArticle" value="<?php echo $no_produit ?>"></td>-->
                        <td><i style="cursor: pointer;" class="fa fa-times-circle" onclick="document.getElementById('form-<?php echo $no_produit ?>').submit();"></i></td>
                        <td><img src="<?php echo $photo_produit['photo1']?>" ></td>
                        <td><?php echo $article['designation']?></td>
                        <td><?php echo number_format($article['prix'], 2, ',', ' ') ?> MAD</td>
                        <td><?php echo $panier_article['qts']?></td>
                        <td><?php echo number_format(($article['prix']*$panier_article['qts']), 2, ',', ' ')?> MAD</td>
                        <input type="hidden" name="noArticle" value="<?php echo $no_produit ?>">
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
                    <td><strong><?php echo number_format($total, 2, ',', ' ')  ?> MAD</strong></td>
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
        <p style="margin-top:120px; font-size:40px" align="center" >Le panier est vide</p>
        <br>
        <br>
        <h1 align="center"><a href="index.php">Accueil</a></h1>

    <?php
        }
    ?>

<footer class="section-p1">
        <div class="col"  style="color: white;">
            <img class="logo" src="img/logo.png" alt="">
            <h4>Contact</h4>
            <p  style="color: white;"><strong>Address: </strong> IGA - Belvédère, Casablanca, Maroc</p>
            <p  style="color: white;"><strong>Téléphoner:</strong> +212 6 12 34 56 78 </p>
            <p  style="color: white;"><strong>Heures:</strong> 9:00 - 18:00, Lun - Sam</p>

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