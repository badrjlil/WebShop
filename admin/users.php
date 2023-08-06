<?php
require_once("../connexion.php");
if(isset($_GET['lpage'])){
  $lpage=$_GET['lpage'];
}else{
  $lpage=0;
}
if(isset($_GET['keyword'])){
  $keyword=$_GET['keyword'];
  $sql="select idClient, prenom, nom, email, type from Clients WHERE nom like '%$keyword%' OR prenom like '%$keyword%' OR email like '%$keyword%' ";
}else{
  $sql="select idClient, prenom, nom, email, type from Clients";
}

$reponse=mysqli_query($connexion,$sql);

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
<div id="searchbar" >
        <form action="" action="get">
          <div style="display:inline-block;"><input type="text" name="keyword" value="<?php if(isset($_GET['keyword'])){ echo $keyword;}?>"></div>
          <div style="display:inline-block;"><input id="search-btn" type="submit" value="Rechercher"></div>
        </form>
</div>
<br>  
<div class="box-8">
		<div class="content-box">
			<p>Les Commandes</p>
			<br/>
      <table class="table">
                  <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Prenom</th>
                      <th>Email</th>
                      <th>Type</th>
                      <th>Action</th>
                      

                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $row=mysqli_fetch_all($reponse,MYSQLI_ASSOC);
                  $nbr= count($row);
                  $start=$lpage*8;
                  $lines=0;
                  for ($i = $start; $i < $nbr; $i++) {
                    $lines+=1;

                   
                    ?>
                    <tr>
                      <td><?php  echo $row[$i]['nom']?></td>
                      <td><?php  echo $row[$i]['prenom'] ;?></td>
                      <td><?php echo $row[$i]['email'] ?></td>
                      <td><?php  echo $row[$i]['type'] ?></td>
                      <td><button>Modifier</button></td>
                    </tr>
                  <?php
                    if($lines==8){
                      break;
                    }
                  }?>
                    
                  </tbody>

              </table>
              <div style="display:flex; width :10%; margin-left:50%; transform: translate(-50%, -50%);">
                <?php
                  for($j=0;$j<(ceil($nbr/8));$j++){
                    echo '<button style="margin :0% 5%" onclick="window.location.href=\'users.php?';
                    if(isset($_GET['keyword'])){
                      echo "keyword=" . $keyword . "&";
                    }
                    echo "lpage=" . $j . "'\">" . $j+1 . "</button>";
                  }
                ?>
                </div>
		</div>
	</div>
	</div>


</body>
</html>


