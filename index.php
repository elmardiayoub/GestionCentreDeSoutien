<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="Techno/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="Techno/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="Techno/css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <a class="navbar-brand mr-1" href="index.html">Page d'acceuil</a>

        <!-- Navbar -->

        <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">

            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle fa-fw"></i>
                    <span> <?php echo $_SESSION['username']; ?> </span>

                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
                </div>
            </li>
        </ul>

    </nav>

    <div id="wrapper">
        <div id="content-wrapper">

            <div class="container-fluid">

                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Overview</li>
                </ol>

                <!-- Icon Cards-->
                <div class="row">
                    <div class="col-xl-6 col-sm-6 mb-3">
                        <div class="card text-white bg-primary o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-user-tie"></i>
                                </div>
                                <div class="mr-5">Gestion de Professeurs</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="Professeurs/professeurs.php">
                                <span class="float-left">Voir détails</span>
                                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-sm-6 mb-3">
                        <div class="card text-white bg-info o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-user-graduate"></i>
                                </div>
                                <div class="mr-5">Gestion des apprenants</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="Apprenants/Apprenants.php">
                                <span class="float-left">Voir détails</span>
                                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-sm-6 mb-3">
                        <div class="card text-white bg-success o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-clock"></i>
                                </div>
                                <div class="mr-5">Gestion des cours</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="Cours/Cours.php">
                                <span class="float-left">Voir détails</span>
                                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-sm-6 mb-3">
                        <div class="card text-white bg-danger o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-calendar-check"></i>
                                </div>
                                <div class="mr-5">Gestion des absences</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="Absences/absence-new.php">
                                <span class="float-left">Voir détails</span>
                                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="container center_div">
                <div class="row">
                    <div class="col-xl-12 ">
                        <div class="card text-white bg-warning o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-envelope"></i>
                                </div>
                                <div class="mr-5">Gestion des SMS</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="SMS/SMS.php">
                                <span class="float-left">Voir détails</span>
                                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>



            <footer class="sticky-footer " style="width: 100%;">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright © ILISI 2019</span>
                    </div>
                </div>
            </footer>

            <!-- /#wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

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
                            <a class="btn btn-primary" href="login.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="Techno/vendor/jquery/jquery.min.js"></script>
            <script src="Techno/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Page level plugin JavaScript-->
            <script src="Techno/vendor/chart.js/Chart.min.js"></script>
            <script src="Techno/vendor/datatables/jquery.dataTables.js"></script>
            <script src="Techno/vendor/datatables/dataTables.bootstrap4.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="Techno/js/sb-admin.min.js"></script>

            <!-- Demo scripts for this page-->
            <script src="Techno/js/demo/datatables-demo.js"></script>
            <script src="Techno/js/demo/chart-area-demo.js"></script>

</body>

</html>