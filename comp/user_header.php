<?php

   if(isset($message)){
    foreach($message as $message){
       echo '
       <div style="background-color: black;" class="message">
          <span>'.$message.'</span>
          <i class="fas fa-times" id="close-button" onclick="this.parentElement.remove();"></i>
       </div>
       ';
    }
 }
?>

<section id="header">
    <a href="#"><img src="images/logo.png" class="logo" alt=""></a>
    <div>
        <form action="" method="post">
            <div class="search-box">
                <input id="search-input" type="text"  placeholder="Rechercher" value="<?php if(isset($_REQUEST['keyword'])){ echo $keyword;} ?>" name="keyword">
                <input id="search-button" type="submit" value="Chercher">
            </div>
        </form>      
    </div>
    <div>
        <ul id="navbar">
            <li><a href="/">Accueil</a></li>
            <li><a href="shop.php">Produits</a></li>
            <li><a href="about.php">À propos de nous</a></li>
            <li><a href="contact.php">Contactez-nous</a></li>
            <li id="lg-bag"><a href="cart.php"><i class="far fa-shopping-bag"></i></a></li>
            <li><a href="login.php"><i class="fa fa-user"></i></a></li>
        </ul>
    </div>
</section>