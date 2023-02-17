<?php
  require_once("../connexion.php");
  $sql="SELECT * FROM Commandes ORDER BY num DESC";
  $articles_query=mysqli_query($connexion,$sql);
?>

<!Doctype HTML>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../css/dashboard.css" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
    <script src="script.js" defer></script>
</head>


<body>

<?php include '../comp/admin_header.php';  ?>

<div class="box-8">
		<div class="content-box">
			<p>Les Commandes</p>
			<br/>
      <table>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Total</th>
          <th>Status</th>
          <th>Date</th>
          <th>Details</th>
        </tr>
        <?php
              $lines=0;
              while($orders=mysqli_fetch_assoc($articles_query)){
                $lines++;
              ?>
              <tr <?php  if($orders['status'] == "Pending"){ echo "style='background-color: #ec7e0020'";} ?>>
                <td><?php echo sprintf('%05d', $orders['num']);  ?></td>
                <?php 
                  $idClient=$orders['idClient'];
                  $noArticle=$orders['noArticle'];
                  $sql="SELECT * FROM Clients WHERE idClient = '$idClient'";
                  $query=mysqli_query($connexion,$sql);
                  $client=mysqli_fetch_assoc($query);
                  $sql="SELECT * FROM Articles WHERE noArticle = '$noArticle'";
                  $query=mysqli_query($connexion,$sql);
                  $article=mysqli_fetch_assoc($query);
                ?>
                <td><?php echo $client['prenom'] . " " . $client['nom'] ?></td>
                <td><?php echo number_format($orders['prix_total'], 2, ',', ' ')  . " MAD" ?></td>
                <td><?php echo $orders['status'] ?></td>
                <td><?php echo date("d-m-Y", strtotime($orders['date']))   ?></td>
                <td><button onclick="window.location.href='order.php?num=<?php echo $orders['num'] ?>'">Afficher</button></td>
              </tr>
              <?php
                }
              ?>     
      </table>
		</div>
	</div>
	</div>


</body>
</html>