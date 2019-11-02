<?php 
       session_start();
       $conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
       mysqli_set_charset($conn,"utf8");


       $id_facture = mysqli_real_escape_string($conn, $_GET['id']);
    
       // Create Query
       $query = "SELECT * from paiement,cours WHERE cours.id_cours=paiement.id_cours AND id_facture='$id_facture'";
       $result = mysqli_query($conn, $query);
       $post = mysqli_fetch_assoc($result); 

       $query = 'SELECT modedepaiement.id_mode from modedepaiement,facture where modedepaiement.id_mode=facture.id_mode and id_facture='.$id_facture.'' ;
       $result = mysqli_query($conn, $query);
       $post5 = mysqli_fetch_assoc($result);

       $query = "SELECT * from professeur WHERE id='".$post['id']."'";
       $result = mysqli_query($conn, $query);
       $post1 = mysqli_fetch_assoc($result);
       
       $query = "SELECT * from facture where id_facture='$id_facture'";
       $result = mysqli_query($conn, $query);
       $post3 = mysqli_fetch_assoc($result);
       
       $query = "SELECT cours.id_cours,libellé_mat,libellé_niv,type,paiement.NbrHeureEnseingé,paiement.montant from cours,matière,niveau,paiement 
       WHERE cours.id_mat=matière.id_mat AND cours.id_niveau=niveau.id_niveau 
            and paiement.id_cours=cours.id_cours  AND cours.id='".$post['id']."' AND paiement.id_facture='$id_facture'";
       $result = mysqli_query($conn, $query);




        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <!-- Custom fonts for this template-->
    <link href="../Techno/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../Techno/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../Techno/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body onload="convert();">

<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Tarification</h2>
                <h3 class="pull-right"><strong>Nᵒ facture : </strong> #<?php echo ($id_facture);?></h3>
                
    		</div>
    		<hr>
            <br/>
            <div style= "margin-bottom: 5em;">
            </div>
    		<div class="row">
    			<div class="col-xs-6">
                    <strong>Nom :  </strong> <?php echo ($post1["Nom"]);?><br>
                    <strong>Prénom : </strong> <?php echo ($post1["Prénom"]);?><br>
                    <strong>Téléphone : </strong> <?php echo ($post1["Numtele"]);?><br>
                    <strong>Email : </strong> <?php echo ($post1["email"]);?><br><br>
    			</div>
    			<div class="col-xs-6 text-right">
                    <address>
    					<strong>Date de tarification:</strong><br>
                        <?php echo $post3["date"]?><br><br>
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
                    <strong>Mèthode de paiement:</strong><br>
                        <?php if($post5["id_mode"]==1){
                        ?><p>Espèces</p><?php } else if($post5["id_mode"]==2) {?>
                            <p>Carte bancaire</p><?php } else if($post5["id_mode"]==3) {?>
                            <p>Chèque</p> <?php } ?>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Bilan de tarification</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Cours</strong></td>
        							<td class="text-center"><strong>Matière</strong></td>
        							<td class="text-center"><strong>Niveau</strong></td>
        							<td class="text-center"><strong>Type</strong></td>
        							<td class="text-center"><strong>Heures Enseingées</strong></td>
        							<td class="text-right"><strong>Montant</strong></td>
                                </tr>
    						</thead>
    						<tbody>
                                <?php while($row= mysqli_fetch_array($result)){?>
                                <tr>
                                    <td><?php echo $row["id_cours"]; ?></td>
                                    <td class="text-center"><?php echo $row["libellé_mat"]; ?></td>
                                    <td class="text-center"><?php echo $row["libellé_niv"]; ?></td>
                                    <td class="text-center"><?php echo $row["type"]; ?></td>
                                    <td class="text-center"><?php echo $row["NbrHeureEnseingé"]; ?></td>
                                    <td class="text-right"><?php echo $row["montant"] ?> DH</td>
                                </tr>
                                <?php }?>
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><h5 style="font-weight:bold">Total en nombre</h5></td>
    								<td class="thick-line text-right"><?php echo $post3["somme"]?> DH</td>
    							</tr>
    							<tr>
    								<td ></td>
    								<td ></td>
    								<td ></td>
    								<td ></td>
    								<td class="text-center"><h5 style="font-weight:bold">Total en chiffre</h5></td>
                                    <td id="conversion" class="text-right"  style="text-transform: uppercase;  ">
                                    <script language="javascript">
	
                                        function convert(){
                                            window.print();
                                            document.getElementById("conversion").innerHTML	=	
                                                    NumberToLetter(<?php echo $post3["somme"]; ?>)+" DIRHAMS";
                                        }</script>
                                    </td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    
    </div>
    <br><br>
    <div class="row">
        <div class="col-xs-10 text-right">
                <strong>Signature</strong>
    	</div>
</div>
</div>


</body>
</html>
  <script src="Sciptimrimante.js"></script>
  <script language="javascript" src="nombre_en_lettre.js"></script>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <!-- Bootstrap core JavaScript-->
  <script src="../Techno/vendor/jquery/jquery.min.js"></script>
  <script src="../Techno/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../Techno/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../Techno/vendor/chart.js/Chart.min.js"></script>
  <script src="../Techno/vendor/datatables/jquery.dataTables.js"></script>
  <script src="../Techno/vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../Techno/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../Techno/js/demo/datatables-demo.js"></script>
  <script src="../Techno/js/demo/chart-area-demo.js"></script>