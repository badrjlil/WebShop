<?php
require_once("../connexion.php");
$messagae_id=$_GET['id'];
$requete="SELECT * FROM messages WHERE id = $messagae_id";
$reponse=mysqli_query($connexion,$requete);
$messagae=mysqli_fetch_assoc($reponse);
$sql="UPDATE messages SET statut = 'read' WHERE id = $messagae_id";
$query=mysqli_query($connexion,$sql);

?>

<!Doctype HTML>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../css/dashboard.css" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
    <script src="../js/admin.js" defer></script>
</head>


	<body>

		<?php include '../comp/admin_header.php';  ?>

			<section class="core">
				<div class="core-item" style="">
					<div style="display: inline-block;margin:0px 7%">
						<h4>Nom complet:</h4>
						<p> <?php echo $messagae['prenom'] . " " . $messagae['nom']?></p>
					</div>
					<div style="display: inline-block;margin:0px 5%">
						<h4>Email: </h4>
						<p><?php echo $messagae['email'] ?></p>
					</div>
					<div style="display: inline-block;margin:0px 5%">
						<h4>Téléphone:</h4>
						<p><?php echo "+212 " . substr_replace($messagae['telephone'], '-', 3, 0) ?></p>
					</div>
					<div style="display: inline-block;margin:0px 7%">
						<h4>Date: </h4>
						<p><?php echo date("d-m-Y", strtotime($messagae['date']))  ?></p>
					</div>
					<div style="display: inline-block;margin:0px 5%">
						<h4>Heure: </h4>
						<p><?php echo date("H:i", strtotime($messagae['date']))  ?></p>
					</div>
					<h4>Message:</h4>
					<p style="border:red 1px solid; padding: 50px 20px"><?php echo $messagae['message'] ?></p>
					<button style="width:20%; margin:0% 75%" onclick="window.location.href='unread_message.php?id=<?php echo $messagae['id'] ?>'">Marquer comme non lu</button>
				</div>
			</section>
		</div>
	</body>
</html>