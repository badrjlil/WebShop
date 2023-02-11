<?php
	require_once("connexion.php");
	$requete="select * from categorie";
	$resultat=mysqli_query($connexion,$requete);
?>
<html>
<head>
<title>Formulaire de saisie des articles</title>
</head>

<body>
	<table>
	<form method="post" action="ajouter.php" enctype="multipart/form-data">
		<tr>
		<td>Désignation :</td><td><input type="text" name="designation" /></td>
		</tr>
		<tr>
		<td>Prix :</td><td><input type="text" name="prix" /></td>
		</tr>
		<tr>
		<td>Catégorie :</td>
		<td><select name="categorie">
			<?php
				while($ligne=mysqli_fetch_assoc($resultat)){
			?>
			<option value="<?php echo $ligne['idCategorie']?>"><?php echo $ligne['nomCategorie']?></option>
			<?php
			}
			?>
		</select>
		</td>
		</tr>
		<tr>
		<td>Photo :</td><td> <input type="file" name="photo" /></td>
		</tr>
		<tr>
		<td colspan="2">
		<input type="submit" value="Save" />
		</td>
		</tr>
	</form>
	</table>
</body>
</html>
