<?php
    require_once("../connexion.php");
    $no_produit=$_POST['noArticle'];
    $designation=$_POST['designation'];
    $prix=$_POST['prix'];
    $description=$_POST['description'];
    $quantite=$_POST['quantite'];
    $photo1=$_FILES['photo1']['name'];
    $photo2=$_FILES['photo2']['name'];
    $photo3=$_FILES['photo3']['name'];
    $photo4=$_FILES['photo4']['name'];
    $photo5=$_FILES['photo5']['name'];
    $photo6=$_FILES['photo6']['name'];

    $sql="UPDATE Articles SET designation='$designation', prix=$prix, description=\"$description\", quantite=$quantite WHERE noArticle=$no_produit";
    $query=mysqli_query($connexion,$sql);
    for ($i = 1; $i <= 6; $i++) {
        if(strlen (${"photo" . $i})!=0 ){
            $photo=${"photo" . $i};
            $fileExt = explode('.', $photo);
            $fileActualExt = strtolower(end($fileExt));
            $fileNameNew = uniqid(sprintf('%05d', $no_produit) . "-" . $i . "-", true).".".$fileActualExt;
            $photo_num="photo" . $i;
            $photo_path_name="produits/" . $fileNameNew;
            $photo_path="../produits/" . $fileNameNew ;
            $photo_path_tmp=$_FILES["photo" . $i]['tmp_name'];
            move_uploaded_file($photo_path_tmp,$photo_path);
            $sql="UPDATE Photos SET $photo_num='$photo_path_name' WHERE noArticle=$no_produit";
            $query=mysqli_query($connexion,$sql);
        }
    }
    header("location:produits.php");
?>