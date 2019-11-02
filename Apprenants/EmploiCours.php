<?php
    session_start();
   $conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
   mysqli_set_charset($conn,"utf8");


   // Create Query
   $id = mysqli_real_escape_string($conn, $_GET['id_cours']);
   $_SESSION['id_cours']=$id;
//    $query =" SELECT  * FROM  `apprenant` WHERE `id_app` ='$id'";
//    $result = mysqli_query($conn, $query);
//    $post = mysqli_fetch_assoc($result);

//    mysqli_free_result($result);

//    // Close Connection
//    mysqli_close($conn);
?>
<?php include("include/header.php");?>
<body onload="render_table()">
<div id="content-wrapper" >
<div class="container-fluid">
    <div class="hero-unit">

      <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="../index.html">Acceuil</a>
          </li>
          <li class="breadcrumb-item">
            <a href="AjouterAppr.php?req=1">Ajouter un apprenant</a>
          </li>
          <li class="breadcrumb-item active">Emploi du cours</li>
        </ol>

      
    </div>


    <div class="timetable"></div>

    

</div>
</div>


<script src="scripts/timetable.js"></script>
<script src="ScriptEmploicours.js"></script>
<?php  include("include/footer.php"); ?>