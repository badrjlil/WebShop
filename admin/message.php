

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
<?php
require_once("../connexion.php");

$id=$_GET['id'];
$requete="select id,nom,prenom,email,telephone,substr(message,1,20) as messageko,Statut,date from messages WHERE id = $id";
$reponse=mysqli_query($connexion,$requete);
echo "test";
?>
			<p>Messages</p>
			<br/>

            <p>Nom complet: </p>
            <?php  echo $reponse['nom'] . " "  .  $row['prenom'] ;?>


</body>
</html>


