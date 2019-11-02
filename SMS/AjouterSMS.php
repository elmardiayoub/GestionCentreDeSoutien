<?php include("include/header.php");?>
<?php include("../module-sms/sms-php.php"); ?>
<?php
  if(isset($_POST['send-mod']))
    {   
      if(isset($_POST['text']))
      header("location:addmodele.php?text=".$_POST['text']) ;
    }
   else if(isset($_POST['envoyer-sms']))
    {
       if(isset($_POST['num-contact']) && isset($_POST['nom-contact']) && isset($_POST['text'])){
        envoyer_sms_new($_POST['nom-contact'],$_POST['num-contact'],$_POST['text']);
       // echo $_POST['num-contact'];
      header("location:page-validation.php");
    }
  }
 ?>
<div id="content-wrapper">
<div class="container-fluid">
<ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="../index.html">Acceuil</a>
      </li>
      <li class="breadcrumb-item active">Nouveau SMS</li>
    </ol>
    <body>
  <div class="container " >
    <div class="card card-register mx-auto mt-5" style="margin-bottom:5em;">
      <div class="card-header">Envoyer un nouveau SMS</div>
      <div class="card-body">
        <form method="post" action="#" >
         <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  <input type="tele" id="num" name="num-contact" class="form-control" placeholder="+2126000000000" onkeyup="rechercher_num(this.value);">
                  <label for="num">+2126000000000</label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12">
              <select id="err_num" style="display: none;" class="browser-default custom-select custom-select-lg ">
                <option selected>--------</option>
               </select>
            </div>
            </div>
          </div>
           <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  <input type="text" id="nom" name="nom-contact" class="form-control"
                   placeholder="Nom du Contact" onkeyup="rechercher_nom(this.value)" >
                  <label for="nom">Nom du Contact</label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12">
              <select id="err_nom" style="display: none;" 
               class="browser-default custom-select custom-select-lg ">
                <option selected>--------</option>
               </select>
            </div>
            </div>
          </div>
           <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
              <select id="modele" name="modele" class="browser-default custom-select custom-select-lg " onchange="run(this.id);">
                <option selected>Choisir un modèle</option>
               </select>
            </div>
            </div>
          </div>
              <!--Textarea with icon prefix-->
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <i class="fas fa-pencil-alt prefix"></i>
                <textarea id="message" name="text" class="md-textarea form-control" rows="3"></textarea>
              </div>
            </div>
                
                <button id="send_modele" class="btn btn-dark col-md-12" name="send-mod">Ajouter aux modèles</button>
              
          </div>
            <!--form method="post" action="#"-->
            <button id="send" name="envoyer-sms" class="btn btn-primary col-12">Envoyer</button>
          <!--/form-->
        </form>
 </div>
    </div>
  </div>
</div>

<script src="send.js"></script>
<script src="display.js"></script>

<?php  include("include/footer.php"); ?>