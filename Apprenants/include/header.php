<?php ob_start(); session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Apprenants</title>

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

        <a class="navbar-brand mr-1" href="#">Gestion des Apprenants</a>
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
        <a class="nav-link" href="Apprenants.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Liste des Apprenants</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="AjouterAppr.php?req=1">
          <i class="fas fa-fw fa-user-plus"></i>
          <span>Ajouter un apprenant</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="AjouterContact.php">
          <i class="fas fa-fw fa-user-plus"></i>
          <span>Ajouter un contact</span></a>
      </li>
      <li class="nav-item" >
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" 
          role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Archive</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="listeContacts.php">Liste des contacts</a>
          <a class="dropdown-item" href="Archive.php">Archive d'apprenant</a>
        </div>
      </li>
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