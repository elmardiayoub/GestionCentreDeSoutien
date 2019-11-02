<?php
    session_start();
   $conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
   mysqli_set_charset($conn,"utf8");


   // Create Query
   $id = mysqli_real_escape_string($conn, $_GET['id']);
   $_SESSION['id']=$id;
   $query =" SELECT  * FROM  `professeur` WHERE `id` ='$id'";
   $result = mysqli_query($conn, $query);
   $post = mysqli_fetch_assoc($result);

   mysqli_free_result($result);

   // Close Connection
   mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Professeurs</title>
  <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
  <!-- Custom fonts for this template-->
  <link href="../Techno/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../Techno/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../Techno/css/sb-admin.css" rel="stylesheet">

  <link rel="stylesheet" href="styles/timetablejs.css">
  <link rel="stylesheet" href="styles/demo.css">

</head>

<body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <a class="navbar-brand mr-1" href="#">Gestion des professeurs</a>
        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
          <i class="fas fa-bars"></i></button>

<ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">

<li class="nav-item dropdown no-arrow">
<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="fas fa-user-circle fa-fw"></i>
<span> <?php echo $_SESSION['username']; ?> </span>

</a>
<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

<div class="dropdown-divider"></div>
<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
</div>
</li>
</ul>
    </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="../index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Acceuil</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="professeurs.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Liste des professeurs</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="AjouterProf.php">
          <i class="fas fa-fw fa-user-plus"></i>
          <span>Ajouter</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Archive.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Archive</span></a>
      </li>
    </ul>


                    <!-- Logout Modal-->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="/Plateforme - Copie/login.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
<body onload="render_table()">
<div id="content-wrapper" >
<div class="container-fluid">
    <div class="hero-unit">
          <?php if($post["Archive"]){?>
      <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="../index.html">Acceuil</a>
          </li>
          <li class="breadcrumb-item">
            <a href="Archive.php">Archive</a>
          </li>
          <li class="breadcrumb-item active">emploie</li>
        </ol>
      <?php }else  {?>
      <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="../index.html">Acceuil</a>
          </li>
          <li class="breadcrumb-item">
            <a href="professeurs.php">Liste des professeurs</a>
          </li>
          <li class="breadcrumb-item active">emploie</li>
        </ol>
      <?php } ?>
      
    </div>
    <div class="row">
    <div class="offset-md-4">
    <div class="invoice-title">
          <h2>Horaire du professeur </h2>
                <h3 class="container center-div"><strong><?php echo($post['Nom']) ?> <?php echo($post['Prénom']) ?></strong> </h3>
                
        </div>
      </div>
      </div>

    <div class="timetable"></div>

    

</div>
</div>


<script src="scripts/timetable.js"></script>
<script src="ScriptTableemploie.js"></script>
<?php  include("include/footer.php"); ?>