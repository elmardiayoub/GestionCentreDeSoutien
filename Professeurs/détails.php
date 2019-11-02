<?php
   $conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
   mysqli_set_charset($conn,"utf8");


   // Create Query
   $id = mysqli_real_escape_string($conn, $_GET['id']);
   $query =" SELECT  * FROM  `professeur` WHERE `id` ='$id'";

   // Get Result
   $result = mysqli_query($conn, $query);
    
   // Fetch Data
   $post = mysqli_fetch_assoc($result);

   // Free Result
   mysqli_free_result($result);

   // Close Connection
   mysqli_close($conn);
?>
<?php include("include/header.php"); ?>
<div id="content-wrapper">
<div class="container-fluid">

<?php if($post["Archive"]){?>
<ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="../index.html">Acceuil</a>
      </li>
      <li class="breadcrumb-item">
        <a href="Archive.php">Archive</a>
      </li>
      <li class="breadcrumb-item active">Détails</li>
    </ol>
<?php }else  {?>
<ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="../index.html">Acceuil</a>
      </li>
      <li class="breadcrumb-item">
        <a href="professeurs.php">Liste des professeurs</a>
      </li>
      <li class="breadcrumb-item active">Détails</li>
    </ol>
<?php } ?>
    <div class="row">
      <div class="col-sm-4"><img src="<?php echo $post["Imaage"] ?>" class="rounded" ></div>
      <div  class="col-sm-8">
      <table class="table"  width="100%" cellspacing="0">

      <tbody>
          <tr>
            <th scope="row">Nom</th>
            <td><?php echo ($post['Nom'])?></td>
          </tr>
          <tr>
            <th scope="row">Prénom</th>

            <td><?php echo ($post['Prénom'])?></td>

          </tr>
          <tr>
            <th scope="row">CIN</th>
            <td><?php echo ($post['CIN'])?></td>
          </tr>
          </tr>
          <tr>
            <th scope="row">Date de naissance</th>
            <td><?php echo ($post['date_naissance'])?></td>

          </tr>
          <tr>
            <th scope="row">Numéro de téléphone</th>
            <td><?php echo ($post['Numtele'])?></td>
          </tr>
          <tr>
            <th scope="row">Adresse mail</th>
            <td><?php echo ($post['email'])?></td>
          </tr>
          </tr>
          <tr>
            <th scope="row">Spécialité</th>
            <td><?php echo ($post['Spécialité'])?></td>
          </tr>

      </tbody>
    </table>
      </div>
    </div>

  
</div>
</div>
<script src="ScriptProf.js"></script>

<?php include("include/footer.php"); ?>