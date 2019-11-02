
<?php include("include/header.php");?>
<div id="content-wrapper">
<div class="container-fluid">
<ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="../index.html">Acceuil</a>
      </li>
      <li class="breadcrumb-item active">Ajouter</li>
    </ol>
    <body>

  <div class="container " >
    <div class="card card-register mx-auto mt-5" style="margin-bottom:5em;">
      <div class="card-header">Ajouter un professeur</div>
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
                  <input type="text" id="CINProf" class="form-control"
                   placeholder="CIN" onblur="valider_CIN()"  maxlength="9">
                  <label for="CINProf">CIN</label>
                  <span id="err_CINProf"></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="tel" id="numProf" class="form-control"
                   placeholder="Numéro téléphone" onblur="valider_numero()" >
                  <label for="numProf">Numéro de téléphone</label>
                  <span id="err_numProf"></span>
                </div>
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
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="date" id="datenaissance" class="form-control"
                         onblur="valider_date()"  maxlength="9">
                  <label for="datenaissance">Date de naissance</label>
                  <span id="err_dateProf"></span>
                </div>
              </div>
              <div class="col-md-6">
              <select id="niveaux" class="browser-default custom-select custom-select-lg " 
                      onblur="valider_niveau()" required>
                <option selected>Spécialité</option>
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
          <div class="col-sm-12">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="fileInputs" >Image</span>
              </div>
              <div class="custom-file">
                <input name="file" type="file" class="custom-file-input"  id="fileInput">
                <label class="custom-file-label " for="inputGroupFile01">Choisir un fichier</label>
              </div>
            </div>
         </div>
        </div>
        
            <button id="submitProf" class="btn btn-primary col-o" onclick="verifier_form()">Ajouter</button>
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
                  <div class="modal-body">Votre professeur à été bien ajouté</div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" onclick="vider();" type="submit" data-dismiss="modal" >OK</button>

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

<script src="ScriptProf.js"></script>

<?php  include("include/footer.php"); ?>

