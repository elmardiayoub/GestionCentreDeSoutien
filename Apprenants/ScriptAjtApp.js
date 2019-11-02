var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
 
  if (this.readyState == 4 && this.status == 200) {
    myObj = JSON.parse(this.responseText);


    for(var i = 0; i<myObj.length ; i++)
    {
        
        var ligne=document.createElement('tr');

        var id_cours=document.createElement('td');
        id_cours.innerHTML = myObj[i].id_cours;
        ligne.appendChild(id_cours);

        var libellé_mat=document.createElement('td');
        libellé_mat.innerHTML = myObj[i].libellé_mat;
        ligne.appendChild(libellé_mat);

        var libellé_niv=document.createElement('td');
        libellé_niv.innerHTML = myObj[i].libellé_niv;
        ligne.appendChild(libellé_niv);

        var Nom=document.createElement('td');
        Nom.innerHTML = myObj[i].Nom;
        ligne.appendChild(Nom);


        var Prénom=document.createElement('td');
        Prénom.innerHTML = myObj[i].Prénom;
        ligne.appendChild(Prénom);
        if(myObj[i].type === "grp")
        {
          var coun=document.createElement('td');
          var button1=document.createElement('button');
          button1.setAttribute("type","button");
          button1.setAttribute("onclick","location.href=('cours_Ind.php?type=grp&id_cours="+myObj[i].id_cours+"')");
          button1.setAttribute("class","btn btn-outline-success");

          var icon1 = document.createElement('i');
          icon1.setAttribute("class","fas fa-fw fa-users");
          button1.appendChild(icon1);
          coun.appendChild(button1);
          ligne.appendChild(coun);

        }else if(myObj[i].type ===   "ind")
        {
          var coun=document.createElement('td');
          var button1=document.createElement('button');
          button1.setAttribute("type","button");
          button1.setAttribute("onclick","location.href=('cours_Ind.php?type=ind&id_cours="+myObj[i].id_cours+"')");
          button1.setAttribute("class","btn btn-outline-success");

          var icon1 = document.createElement('i');
          icon1.setAttribute("class","fas fa-fw fa-user");
          button1.appendChild(icon1);
          ligne.appendChild(button1);
          coun.appendChild(button1);
          ligne.appendChild(coun);
        }
        

        var coun=document.createElement('td');
        var button1=document.createElement('button');
        button1.setAttribute("type","button");
        if(myObj[i].type === "grp")
        button1.setAttribute("onclick","location.href=('EmploiCours.php?id_cours="+myObj[i].id_cours+"')");
        else 
        button1.setAttribute("disabled","disabled");

        button1.setAttribute("class","btn btn-outline-warning");

        var icon1 = document.createElement('i');
        icon1.setAttribute("class","fas fa-fw fa-clock");
        button1.appendChild(icon1);
        coun.appendChild(button1);
        ligne.appendChild(coun);

        var coun=document.createElement('td');
        if(myObj[i].NB)
          coun.innerHTML = myObj[i].NB;
        else
          coun.innerHTML = 0;
       
        ligne.appendChild(coun);

        var Prix=document.createElement('td');

        if(myObj[i].type === "grp")
          Prix.innerHTML = myObj[i].prix_etd_grp+" DH";
        else if(myObj[i].type ===   "ind")
          Prix.innerHTML = myObj[i].prix_etd_ind+" DH";

        ligne.appendChild(Prix);

        var coun=document.createElement('td');
        var input=document.createElement('input');
        input.setAttribute("type","checkbox");
        input.setAttribute("name","checkbok[]");
        input.setAttribute("value",myObj[i].id_cours);
        if(myObj[i].NB == 1 && myObj[i].type === "ind")
        input.setAttribute("disabled","disabled");
        input.setAttribute("onclick","handleChange(this,"+myObj[i].id_cours+")");
        input.setAttribute("style","width:20px; height:20px;");
        coun.appendChild(input);
        ligne.appendChild(coun);

        var coun=document.createElement('td');
        var input=document.createElement('input');
        input.setAttribute("type","text");
        input.setAttribute("name","input[]");
        input.setAttribute("id","inputNum"+myObj[i].id_cours);
        input.setAttribute("disabled","disabled");
        coun.appendChild(input);
        ligne.appendChild(coun);

        document.getElementById("tableauCours").appendChild(ligne);
    }
 
 
  }
};
xmlhttp.open("GET", "fetchCours.php", true);
xmlhttp.send();


function handleChange(checkbox,id) {
  if(checkbox.checked == true){
      document.getElementById("inputNum"+id).removeAttribute("disabled");
  }else{
      document.getElementById("inputNum"+id).setAttribute("disabled", "disabled");
 }
}


var JsonForm=[{ "id" : null,
                "nom" : null,
                "prénom" : null,
                "CIN" : null,
                "numero": null,
                "mail" : null,
                "date" : null,
                "date_inscr" : null,
                "niveau" : null,
                "image" : null
                }];
function Champ_vide(item,erreur)
{
    item.style.border = "1px solid #f00";
    item.style.backgroundColor = "#fba";
    /*Lancement du message d'erreur*/
    erreur.innerHTML="*champ non vide";
    erreur.style.color="red";
}

function non_correspondance(item,erreur)
{
    item.style.border = "1px solid #f00";
    item.style.backgroundColor = "#fba";
    /*Lancement du message d'erreur*/
    erreur.innerHTML="*champ invalide";
    erreur.style.color="red";
    /*positionner le text à droite */
    erreur.style.textAlign="right";
}

function correspondance(item,erreur)
{
    /* Changement de couleur d'entrée en vert*/
    item.style.border = "1px solid #4FE944";
    item.style.backgroundColor = "#AFFBAA";
    /*Si le prénom est valide je supprime
        le message d'erreur */
    erreur.innerHTML="";
}
function empty(item)
{
    item.style.border = "";
    item.style.backgroundColor = "";
    item.value="";
}
function valider_nom()
{
    var Nomexp = /^[a-zA-Z]+[ \-']?[a-zA-Z]+$/;

    var nom = document.getElementById("NomProf");
    var erreur = document.getElementById("err_nomProf");
    JsonForm.nom=nom.value;
    //si le champ est vide
    if(nom.value.length === 0)
    {
         Champ_vide(nom,erreur);
         return false;
    }
    else if (!Nomexp.test(nom.value))
    {
        non_correspondance(nom,erreur);
        return false;
    }
    else
    {
        correspondance(nom,erreur);
        
        return true;
    }

}

function valider_prenom()
{
    var Prénomexp = /^[a-zA-Z]+[ \-']?[a-zA-Z]+$/;

    var prénom = document.getElementById("prénomProf");
    var erreur = document.getElementById("err_prénomProf");
    JsonForm.prénom=prénom.value;
    //si le champ est vide
    if(prénom.value.length === 0)
    {
        Champ_vide(prénom,erreur);
        return false; 
    }
    else if (!Prénomexp.test(prénom.value))
    {
        non_correspondance(prénom,erreur);
        return false;
    }
    else
    {
        correspondance(prénom,erreur);
        return true;
    }

}
function valider_mail()
{
    var Mailexp = /^[A-Za-z0-9]+[_.-]?[A-Za-z0-9]+@\w+\.[a-z]{2,5}$/;
    
    var mail = document.getElementById("emailProf"); 
    var erreur = document.getElementById("err_mailProf"); 
    JsonForm.mail=mail.value;  
    if(mail.value.length === 0)
    {
        return true;
    }
    else if (!Mailexp.test(mail.value))
    {
        non_correspondance(mail,erreur);
        return false;
    }
    else 
    {  
        correspondance(mail,erreur);
        
        return true;
    }
}
function valider_date()
{
    var date = document.getElementById("datenaissance"); 
    var erreur = document.getElementById("err_dateProf");   
    JsonForm.date=date.value;
    if(date.value.length === 0)
    {
        Champ_vide(date,erreur);
        return false;
    }
    else 
    {  
        correspondance(date,erreur);
        return true;
    }
   
}
function valider_date_insc()
{
    var date = document.getElementById("dateinscrp"); 
    var erreur = document.getElementById("err_dateProf2");   
    JsonForm.date_inscr=date.value;
    if(date.value.length === 0)
    {
        Champ_vide(date,erreur);
        return false;
    }
    else 
    {  
        correspondance(date,erreur);
        return true;
    }
   
}


function valider_numero() 
{
    var nombre = document.getElementById('numProf');
    var erreur = document.getElementById('err_numProf');

    var chiffres = new String(nombre.value);
    
    // Enlever tous les charactères sauf les chiffres
    chiffres = chiffres.replace(/[^0-9]/g, '');
    JsonForm.numero=nombre.value;
    // Le champs est vide
    if ( nombre.value.length == 0 )
    {
        return true;
    }
    
    // Nombre de chiffres
    compteur = chiffres.length;
    
    if (compteur!=10)
    {
        non_correspondance(nombre,erreur);
        return false;
    }
    
    else
    {
        correspondance(nombre,erreur);
        
        return true;
    }
    
}

function valider_CIN() 
{
    var CIN = document.getElementById('CINProf');
    var erreur = document.getElementById('err_CINProf');
    JsonForm.CIN=CIN.value;
    if ( CIN.value.length == 0 )
    {
        Champ_vide(CIN,erreur);
        return false;
    }
    else
    {
        correspondance(CIN,erreur);
       
        return true;
    }
    
}
function valider_niveau()
{
    var niveaux = document.getElementById('niveaux');
    var erreur = document.getElementById('err_niveauProf');
    JsonForm.niveau=niveaux.value;
    if ( niveaux.value === "Niveau" || niveaux.value === "")
    {
        Champ_vide(niveaux,erreur);
        return false;
    }
    else
    {
        niveaux.style.border = "1px solid #4FE944";
        niveaux.style.backgroundColor = "#AFFBAA";
        
        return true;
    }
}

function verifier_form()
{
    JsonForm.image  = document.getElementById("fileInput").value.replace("C:\\fakepath\\", "");
    console.log(JsonForm.image);
    var url;
    var one = (valider_numero())||(valider_mail());
    if((valider_nom())&&(valider_prenom())&&(valider_CIN())&& one)
    {
            console.log(JsonForm.nom);
            console.log(JsonForm.prénom);
            console.log(JsonForm.CIN);
            console.log(JsonForm.date);
            console.log(JsonForm.image);
            console.log(JsonForm.numero);
            // url = "FormAppr.php?nom="+JsonForm.nom+"&prénom="+JsonForm.prénom+"&CIN="+
            // JsonForm.CIN+"&numero="+JsonForm.numero+"&mail="+JsonForm.mail+"&date="+JsonForm.date+"&niveau="+
            // JsonForm.niveau+"&image="+JsonForm.image;

            

            // document.getElementById("submitAppr").setAttribute("data-toggle","modal");
            // document.getElementById("submitAppr").setAttribute("data-target","#Ajouter");

            // var xmlhttp = new XMLHttpRequest();
            // xmlhttp.onreadystatechange = function() {
            //     if (this.readyState == 4 && this.status == 200) {
            //         console.log(this.responseText);
            //     }
            // };
            // xmlhttp.open("GET", url, true);
            // xmlhttp.send();
        
    }   
    else 
    {
        document.getElementById("submitADDAppr").setAttribute("data-toggle","");
        document.getElementById("submitADDAppr").setAttribute("data-target","");
        alert("Vous avez pas bien remplie les champs");
    }
    
}
function verifier_form_contact()
{
   var url;
    if((valider_nom())&&(valider_prenom()))
    {

            url = "FormContact.php?nom="+JsonForm.nom+"&prénom="+JsonForm.prénom+
            "&numero="+JsonForm.numero+"&mail="+JsonForm.mail+"&niveau="+JsonForm.niveau;

            

            document.getElementById("submitAppr").setAttribute("data-toggle","modal");
            document.getElementById("submitAppr").setAttribute("data-target","#Ajouter");

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                }
            };
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        
    }   
    else 
    {
        document.getElementById("submitAppr").setAttribute("data-toggle","");
        document.getElementById("submitAppr").setAttribute("data-target","");
        alert("Vous avez pas bien remplie les champs");
    }
    
}