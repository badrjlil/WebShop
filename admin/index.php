<?php
  require_once("../connexion.php");
  $sql="SELECT * FROM Commandes WHERE status = 'En attente' ORDER BY num DESC";
  $pending_commande=mysqli_query($connexion,$sql);
  
  $sql="SELECT COUNT(*) AS 'total_orders', SUM(prix_total) AS 'total_earning' FROM Commandes WHERE status != 'Annule'";
  $total=mysqli_fetch_assoc(mysqli_query($connexion,$sql));
  $sql="SELECT COUNT(*) AS 'total' FROM Articles WHERE quantite <1 AND status = 'active'";
  $outofstock=mysqli_fetch_assoc(mysqli_query($connexion,$sql));
  $sql="SELECT COUNT(*) AS 't_p' FROM Commandes WHERE status = 'En attente'";
  $total_pending_orders=mysqli_fetch_assoc(mysqli_query($connexion,$sql));
?>

<!Doctype HTML>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../css/dashboard.css" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
	
<?php include '../comp/admin_header.php';  ?>


	
	<div class="col-div-3">
		<div class="box">
			<p><?php echo $total['total_orders'] ?><br/><span>Commandes totales</span></p>
			<i class="fa fa-shopping-bag box-icon"></i>
		</div>
	</div>
	<div class="col-div-3">
		<div class="box">
			<p><?php echo $total_pending_orders['t_p']; ?><br/><span>À être expédié</span></p>
			<i class="fa fa-truck box-icon"></i>
		</div>
	</div>
	<div class="col-div-3">
		<div class="box">
			<p><?php echo $outofstock['total'] ?><br/><span>Rupture de stock</span></p>
			<i class="fa fa-exclamation-triangle box-icon"></i>
		</div>
	</div>
	<div class="col-div-3">
		<div class="box">
			<p><?php echo number_format($total['total_earning'], 2, ',', ' ')?><br/><span>Revenu</span></p>
			<i class="fa fa-money box-icon"></i>
		</div>
	</div>
	<div class="clearfix"></div>
	<br/><br/>
	<div class="col-div-8">
		<div class="box-8">
		<div class="content-box">
			<p>Commandes en attente <span><a href="orders.php" style="text-decoration:none; color:#f7403b; font-weight:bold;">Afficher tout</a></span></p>
			<br/>
      <table>
        <tr>
          <th>N° Commande</th>
          <th>Nom</th>
          <th>Prix total</th>
          <th>Date</th>
          <th></th>
        </tr>
        <?php
          $lines=0;
          while($orders=mysqli_fetch_assoc($pending_commande)){
            $lines++;
        ?>
        <tr>
          <td><?php echo "#" . sprintf('%05d', $orders['num']) ?></td>
          <?php 
            $idClient=$orders['idClient'];
            $sql="SELECT * FROM Clients WHERE idClient = '$idClient'";
            $query=mysqli_query($connexion,$sql);
            $client=mysqli_fetch_assoc($query);
          ?>
          <td><?php echo $client['prenom'] . " " . $client['nom'] ?></td>
          <td><?php echo number_format($orders['prix_total'], 2, ',', ' ')  . " MAD" ?></td>
          <td><?php echo date('Y-m-d', strtotime($orders['date'])) ?></td>                
          <td><button onclick="window.location.href='order.php?num=<?php echo $orders['num'] ?>'">Afficher</button></td>
        </tr>
        <?php if($lines==9){break;}} ?>             
      </table>
		</div>
	</div>
	</div>

        <div class="col-div-4">
          <div class="box-4">
          <div class="content-box">
            <p>Commandes livrées</p>
            <div class="circle-wrap">
          <div class="circle">
          <div class="mask full">
            <div class="fill"></div>
            </div>
          <div class="mask half">
          <div class="fill"></div>
          </div>
          <div class="inside-circle"> 70% </div>
          </div>
        </div>
      </div>
    </div>
    
	</div>
<?php
require_once("../connexion.php");
$requete="select prenom, nom ,substr(message,1,20) as messageko,statut from messages where Statut='Unread'";

$reponse=mysqli_query($connexion,$requete);
?>

  <div class="col-div-5">
  <div class="box-4">
		<div class="content-box">
			<p>Messages non lus <span><a href="inbox.php" style="text-decoration:none; color:#f7403b; font-weight:bold;">Afficher tout</a></span></p>
			<br/>
      <table>
        <tr>
          <th>Nom</th>
          <th>Message</th>
        </tr>
        <tr>
        <?php
          $i=0;
          while($row=mysqli_fetch_assoc($reponse)){
          if($i==3){
          break;
          }
          else{
        ?>
      <tr>
        <td><?php echo $row['prenom'] . " " . $row['nom']?></td>
        <td><?php echo $row['messageko'] . "..."?></td>
      </tr>
      <?php 
      
      $i=$i+1;
          }
        }
      ?>  
        </tr>  
      </table>
		</div>
	</div>
	</div>
  
		
	<div class="clearfix"></div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

  $(".nav").click(function(){
    $("#mySidenav").css('width','70px');
    $("#main").css('margin-left','70px');
    $(".logo").css('visibility', 'hidden');
    $(".logo span").css('visibility', 'visible');
     $(".logo span").css('margin-left', '-10px');
     $(".icon-a").css('visibility', 'hidden');
     $(".icons").css('visibility', 'visible');
     $(".icons").css('margin-left', '-8px');
      $(".nav").css('display','none');
      $(".nav2").css('display','block');
  });

$(".nav2").click(function(){
    $("#mySidenav").css('width','300px');
    $("#main").css('margin-left','300px');
    $(".logo").css('visibility', 'visible');
     $(".icon-a").css('visibility', 'visible');
     $(".icons").css('visibility', 'visible');
     $(".nav").css('display','block');
      $(".nav2").css('display','none');
 });

</script>

</body>


</html>
