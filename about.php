<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> About Us Page Design </title>
    
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />


</head>

<body>
    <!--================== Header Section Starts from Here ==================-->
    <?php
    include 'comp/user_header.php';
?>
    <!--================== Header Section Ends Here -->


    <!--================== Home Section Starts from Here ==================-->
    <section style="margin-top: 120px" id="home">
        <div class="home-left">
            <img src="./img/user.jpg" alt="">
        </div>
        <div class="home-right">
            <h2 class="home-heading"> </h2>
            <p class="home-para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta quibusdam blanditiis
                quas assumenda nam error vel dolores suscipit ad, sapiente deleniti ipsum, obcaecati perspiciatis.</p>
            <a style="color:white;" href="" class="btn"> Notre travail</a>
        </div>
    </section>
    <!--================== Home Section Ends Here -->

    <!--================== Workflow Section Starts from Here ==================-->
    <section id="workFlow">
        <h2 class="heading"></h2>
        <p class="para">Lorem ipsum dolor sit amet consectetur adipisicing elit. A, commodi sint. <br>Ipsam molestias
            nemovel laboriosam consequatur, perferendis<br> minima soluta? Natus necessitatibus autem suscipit!</p>
        <div class="num-container">
            <div class="num-item"><span>27,882 <br>Clients</span></div>
            <div class="num-item"><span>70% <br>Commandes</span></div>
            <div class="num-item"><span>70,592 <br>Produits</span></div>
        </div>
    </section>
    <!--================== Workflow Section Ends Here -->


    <!--================== Goal Section Starts from Here ==================-->
    <section id="goal">
        <div class="goal-left">
            <h2>Notre objectif</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore omnis obcaecati incidunt asperiores,
                mollitia quibusdam velit at itaque sunt, culpa in pariatur quas, temporibus repellendus vitae! Vitae,
                illum asperiores.</p>
            <ul>
                <li> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla, atque!</li>
                <li> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla, atque!</li>
                <li> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla, atque!</li>
            </ul>
            <a href="" class="btn"> Contact Us</a>
        </div>
        <div class="goal-right">
            <img src="img/our goal.jpg" alt="">
        </div>
    </section>
    <!--================== Goal Section Ends Here -->

    <!--================== Our Team Section Starts from Here ==================-->
    <section id="our-Team">
        <h2>Notre membre</h2>
        <div class="teamContainer">
            <div class="team-item">
                <img src="img/teamMember.png" alt="">
                <h5 class="member-name">John Smith</h5>
                <span class="role">seo expert</span>
            </div>
            <div class="team-item">
                <img src="img/teamMember.png" alt="">
                <h5 class="member-name">John Smith</h5>
                <span class="role">seo expert</span>
            </div>
            <div class="team-item">
                <img src="img/teamMember.png" alt="">
                <h5 class="member-name">John Smith</h5>
                <span class="role">seo expert</span>
            </div>
            <div class="team-item">
                <img src="img/teamMember.png" alt="">
                <h5 class="member-name">John Smith</h5>
                <span class="role">seo expert</span>
            </div>
        </div>
    </section>
    <!--================== Our Team Section Ends Here -->

    <!--================== Footer Starts from Here ==================-->
    <footer>
        <p> ©2023 Online Ecommerce Shop </p>
    </footer>
    <!--================== Footer Ends Here -->

</body>
<script src="about_new.js"></script>
</html>