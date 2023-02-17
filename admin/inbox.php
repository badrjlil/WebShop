<?php
require_once("../connexion.php");
$requete="select id,nom,prenom,substr(message,1,40) as messageko,Statut,date from messages";
$reponse=mysqli_query($connexion,$requete);

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
      <table class="table">
                  <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Message</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Action</th>
                      

                    </tr>
                  </thead>
                  <tbody>
                  <?php
                     while($row=mysqli_fetch_assoc($reponse)){
                    ?>
                    <tr>
                      <td><?php  echo $row['nom'] . " "  .  $row['prenom'] ;?></td>
                      <td><?php echo $row['messageko'] . "..." ?></td>
                      <td><?php  echo date("d-m-Y", strtotime($row['date']))?></td>
                      <td><?php  echo $row['Statut'] ?></td>
                      <td><button onclick="window.location.href='message.php?id=<?php echo $row['id'] ?>'">Afficher</button></td>
                    </tr>
                    <?php }?>
                    
                                      </tbody>

              </table>
		</div>
	</div>
	</div>


</body>
</html>


