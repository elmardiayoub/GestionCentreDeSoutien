<?php
   $conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
   mysqli_set_charset($conn,"utf8");


   // Create Query
   $id = mysqli_real_escape_string($conn, $_GET['id']);
   $query =" SELECT  * FROM  `professeur` WHERE `id` ='$id'";
   $query1 =" SELECT  Spécialité FROM  `professeur`";

   // Get Result
   $result = mysqli_query($conn, $query);
   $result1 = mysqli_query($conn, $query1);
    
   // Fetch Data
   $post = mysqli_fetch_assoc($result);
   $post1 = mysqli_fetch_assoc($result1);

   // Free Result
   mysqli_free_result($result);

   // Close Connection
   mysqli_close($conn);
?>
<?php include("include/header.php");?>
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
    <li class="breadcrumb-item active">Modifier</li>
  </ol>
<?php }else  {?>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../index.html">Acceuil</a>
    </li>
    <li class="breadcrumb-item">
      <a href="professeurs.php">Liste des professeurs</a>
    </li>
    <li class="breadcrumb-item active">Modifier</li>
  </ol>
<?php } ?>
  <div class="container center_div">
    <div class="row">
      <div class="col-sm-4 offset-md-3"><img style="margin-bottom:2em;" id="img-modifier" 
            src="<?php echo($post["Imaage"])?>" class="rounded" ></div>
      
   </div>
   <div class="row">
    <table class="table col-sm-12 ">
    <div class="col-sm-4 offset-md-3">
            <div class="input-group" style="margin-bottom:2em;">
              <div class="input-group-prepend">
                <span class="input-group-text" id="fileInputs" >Image</span>
              </div>
              <div class="custom-file" >
                <input name="file" type="file" class="custom-file-input"  id="fileInput">
                <label class="custom-file-label " for="inputGroupFile01"><?php echo($post["Imaage"])?>r</label>
              </div>
            </div>
         </div>
    <tbody>
  
      <tr>
        <th scope="row">Nom</th>
        <td>
            <input   id="NomProf" class="form-control col-sm-7" type="text" 
                   value="<?php echo($post["Nom"])?>" onblur="valider_nom()">
            <span id="err_nomProf"></span></td>

      </tr>
      <tr>
        <th scope="row">Prénom</th>

        <td>
            <input id="prénomProf" class="form-control col-sm-7" type="text" 
                 value="<?php echo($post["Prénom"])?>" onblur="valider_prenom()" >
            <span id="err_prénomProf"></span>
        </td>
      </tr>
      <tr>
        <th scope="row">CIN</th>
        <td>
            <input id="CINProf" class="form-control col-sm-7" type="text" 
                   value="<?php echo ($post["CIN"])?>" onblur="valider_CIN()">
           <span id="err_CINProf"></span>
        </td>
      </tr>
      </tr>
      <tr>
        <th scope="row">Date de naissance</th>
        <td>
              <input  id="datenaissance" class="form-control col-sm-7" type="date" 
                   value="<?php echo ($post["date_naissance"])?>" onblur="valider_date()">
              <span id="err_dateProf"></span>    
        </td>

      </tr>
      <tr>
        <th scope="row">Numéro de téléphone</th>
        <td>
              <input id="numProf" class="form-control col-sm-7" type="text" 
                    value="<?php echo ($post["Numtele"])?>"  onblur="valider_numero()" >
              <span id="err_numProf"></span>
        </td>
      </tr>
      <tr>
        <th scope="row">Adresse mail</th>
        <td>
            <input  id="emailProf" class="form-control col-sm-7" type="text"  
                    value="<?php echo ($post["email"])?>" onblur="valider_mail()">
            <span id="err_mailProf"></span>
        </td>
      </tr>
      </tr>
      <tr>
        <th scope="row">Spécialité</th>
        <td>   
                <select id="niveaux" class="browser-default custom-select col-sm-7 " 
                      onblur="valider_niveau()" >
                <option selected><?php echo ($post["Spécialité"])?></option>
                <option>Maths</option>
                <option>Physique</option>
                <option>Chimie</option>
                <option>Français</option>
                <option>Anglais</option>
                <option>Arabe</option>
                <span id="err_niveauProf"></span>
               </select>
        </td>

      </tr>

      <div class="modal fade" id="Modifié" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
                  aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">Les modifications ont été bien enregistrées</div>
                  <div class="modal-footer">
                      <?php if(!$post["Archive"]) {?>
                          <a class="btn btn-secondary" href="professeurs.php"  type="submit">OK</a>
                      <?php } else {?>
                          <a class="btn btn-secondary" href="Archive.php"  type="submit">OK</a>
                          <?php } ?>

                  </div>
                </div>
              </div>
            </div>
  </tbody>
  </table>

</div>
</div>
<div class="container">
  <div class="row">
    <div class="offset-md-8">
    <button id="submitModifier" style="margin-bottom : 2em;" class= "btn btn-primary" 
            type="button" onclick="modifier_form(<?php echo $id ?>)">Sauvegarder</button>
    </div>
  </div>
</div>
  
<script src="ScriptProf.js"></script>
<?php include("include/footer.php"); ?>