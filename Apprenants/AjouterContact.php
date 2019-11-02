
<?php include("include/header.php");?>
<div id="content-wrapper">
<div class="container-fluid">
<ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="../index.html">Acceuil</a>
      </li>
      <li class="breadcrumb-item active">Ajouter un contact</li>
    </ol>
    <body>

  <div class="container " >
    <div class="card card-register mx-auto mt-5" style="margin-bottom:5em;">
      <div class="card-header">Ajouter un contact</div>
      <div class="card-body">
        <form enctype="multipart/form-data" method="post"
              onsubmit="return false ">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="NomProf" class="form-control" 
                  placeholder="Votre nom"  onblur="valider_nom()">
                  <label for="NomProf">Nom</label>
                  <span id="err_nomProf"></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="prénomProf" class="form-control" 
                  placeholder="Votre prénom"  onblur="valider_prenom()">
                  <label for="prénomProf">Prénom</label>
                  <span id="err_prénomProf"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="tel" id="numProf" class="form-control"
                   placeholder="Numéro téléphone" onblur="valider_numero()" >
                  <label for="numProf">Numéro de téléphone</label>
                  <span id="err_numProf"></span>
                </div>
              </div>
              <div class="col-md-6">
              <select id="niveaux" class="browser-default custom-select custom-select-lg " 
                      onblur="valider_niveau()" required>
                <option selected>Niveau</option>
                <option>Maths</option>
                <option>Physique</option>
                <option>Chimie</option>
                <option>Français</option>
                <option>Anglais</option>
                <option>Arabe</option>
                <span id="err_niveauProf"></span>
               </select>
            </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="emailProf" class="form-control" 
              placeholder="Email addresse" onblur="valider_mail()">
              <label for="emailProf">Adresse e-mail</label>
              <span id="err_mailProf"></span>
            </div>
          </div>


            
            <button id="submitAppr" class="btn btn-primary offset-md-3 col-md-5" onclick="verifier_form_contact()">
             Ajouter <i class="fas fa-plus"></i></button>
            <div id="fileDisplayArea"></div>
            <div class="modal fade" id="Ajouter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
                  aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">Votre contact à été bien ajouté</div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" onclick="vider2();" type="submit" data-dismiss="modal" >OK</button>

                  </div>
                </div>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

<script src="ScriptApprenant.js"></script>

<?php  include("include/footer.php"); ?>

