<?php

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="checkout.css">
</head>
<body>
<div class="container">
  <div class="title">
      <h2>Commander</h2>
  </div>
<div class="d-flex">
  <form action="" method="">
    <div style="text-align:center; margin:">
      <label>
        <input type="text" placeholder="Prénom" name="fname">
      </label>
      <label>
        <input type="text" placeholder="Nom" name="lname">
      </label>
      <label>
        <input type="text" name="houseadd" placeholder="Numéro de maison et nom de la rue" required>
      </label>
      <label>
        <input type="text"placeholder="Ville" name="city"> 
      </label>
      <label>
        <input type="text" placeholder="Région" name="city"> 
      </label>
      <label>
        <input type="text" placeholder="Code postal / ZIP" name="city"> 
      </label>
      <label>
        <input type="tel" placeholder="Téléphone name="city"> 
      </label>
      <label>
        <input type="email" placeholder="Adresse email" name="city"> 
      </label>
    </div>
  </form>
  <div class="Yorder">
    <table>
      <tr>
        <th colspan="2">Votre commande</th>
      </tr>
      <tr>
        <td>Product Name x 2(Qty)</td>
        <td>$88.00</td>
      </tr>
      <tr>
        <td>Subtotal</td>
        <td>$88.00</td>
      </tr>
      <tr>
        <td>Shipping</td>
        <td>Free shipping</td>
      </tr>
    </table><br>
    <div>
      <input type="radio" name="dbt" value="dbt" checked> Direct Bank Transfer
    </div>
    <p>
        Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
    </p>
    <div>
      <input type="radio" name="dbt" value="cd"> Cash on Delivery
    </div>
    <div>
      <input type="radio" name="dbt" value="cd"> Paypal <span>
      <img src="https://www.logolynx.com/images/logolynx/c3/c36093ca9fb6c250f74d319550acac4d.jpeg" alt="" width="50">
      </span>
    </div>
    <button type="button">Place Order</button>
  </div><!-- Yorder -->
 </div>
</div>
</body>
</html>