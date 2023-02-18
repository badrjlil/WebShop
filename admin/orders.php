<?php
  require_once("../connexion.php");

  if(isset($_GET['lpage'])){
    $lpage=$_GET['lpage'];
  }else{
    $lpage=0;
  }
  if(isset($_GET['keyword'])){
    $keyword=$_GET['keyword'];
    $sql="SELECT  c.num, cl.prenom, c.date, cl.nom, c.status, c.prix_total FROM Commandes c, Clients cl WHERE c.idClient = cl.idClient AND (cl.nom like '%$keyword%' OR cl.prenom LIKE '%$keyword%' OR c.num LIKE '%$keyword%') GROUP BY c.num ORDER BY num DESC";
  }else{
    $sql="SELECT  c.num, cl.prenom, c.date, cl.nom, c.status, c.prix_total FROM Commandes c, Clients cl WHERE c.idClient = cl.idClient ORDER BY num DESC";
  }
  
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

<div id="searchbar" >
        <form action="" action="get">
          <div style="display:inline-block;"><input type="text" name="keyword" value="<?php echo $keyword?>"></div>
          <div style="display:inline-block;"><input id="search-btn" type="submit" value="Rechercher"></div>
        </form>
</div>
<br>
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
        $orders=mysqli_fetch_all($articles_query,MYSQLI_ASSOC);
        $nbr= count($orders);
        $start=$lpage*8;
        for ($i = $start; $i < $nbr; $i++) {
          $lines+=1;

              ?>
              <tr <?php  if($orders[$i]['status'] == "En attente"){ echo "style='background-color: #ec7e0020'";} ?>>
                <td><?php echo sprintf('%05d', $orders[$i]['num']);  ?></td>
                <td><?php echo $orders[$i]['prenom'] . " " . $orders[$i]['nom'] ?></td>
                <td><?php echo number_format($orders[$i]['prix_total'], 2, ',', ' ')  . " MAD" ?></td>
                <td><?php echo $orders[$i]['status'] ?></td>
                <td><?php echo date("d-m-Y", strtotime($orders[$i]['date']))   ?></td>
                <td><button onclick="window.location.href='order.php?num=<?php echo $orders[$i]['num'] ?>'">Afficher</button></td>
              </tr>
              <?php
                if($lines==8){
                  break;
                }
              }
              ?>     
      </table>
      <div style="display:flex; width :10%; margin-left:50%; transform: translate(-50%, -50%);">
      <?php
        for($j=0;$j<(ceil($nbr/8));$j++){
          echo '<button style="margin :0% 5%" onclick="window.location.href=\'orders.php?';
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