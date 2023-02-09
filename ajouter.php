<?php
	require_once("connexion.php");
	$designation=$_POST['designation'];
	$prix=$_POST['prix'];
	$idCategorie=$_POST['categorie'];
	$file = $_FILES['photo'];

	$fileName = $_FILES['photo']['name'];
	$fileTmpName=$_FILES['photo']['tmp_name'];
	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));
  	
	$fileNameNew = uniqid('', true).".".$fileActualExt;
	$fileDestination = 'images/'.$fileNameNew;
	$fileTmpName=$_FILES['photo']['tmp_name'];
	move_uploaded_file($fileTmpName, $fileDestination);

	$requete="insert into article(designation,prix,idCategorie,photo) values ('$designation',$prix,$idCategorie,'$fileDestination')";
	$resultat=mysqli_query($connexion,$requete);
	echo 'done';
	//header("location:articles.php");
?>
