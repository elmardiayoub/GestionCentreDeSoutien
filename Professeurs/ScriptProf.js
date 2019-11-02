
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  
  if (this.readyState == 4 && this.status == 200) {
    var myObj = JSON.parse(this.responseText);
    for(var i = 0; i<myObj.length ; i++)
    {
        var buttons = [];
        var button1 = document.createElement('button');
        button1.setAttribute("type","submit");
        button1.setAttribute("id",myObj[i].id);
        button1.setAttribute("onclick","location.href=('paiement.php?id="+myObj[i].id+"')");
        button1.setAttribute("class","btn btn-outline-success");
        button1.innerHTML="Paiement ";
    
        var icon1 = document.createElement('i');
        icon1.setAttribute("class","fas fa-fw fa-money-bill");
        button1.appendChild(icon1);
    
        var button2 = document.createElement('button');
        button2.setAttribute("type","submit");
        button2.setAttribute("id",myObj[i].id);
        button2.setAttribute("onclick","location.href=('détails.php?id="+myObj[i].id+"')");
        button2.setAttribute("class","btn btn-outline-dark");
        button2.innerHTML="Plus d'info ";
    
        var icon2 = document.createElement('i');
        icon2.setAttribute("class","fas fa-fw fa-info-circle");
        button2.appendChild(icon2);
    
        var button3 = document.createElement('button');
        button3.setAttribute("type","submit");
        button3.setAttribute("id",myObj[i].id);
        button3.setAttribute("onclick","location.href=('emploie.php?id="+myObj[i].id +"')");
        button3.setAttribute("class","btn btn-outline-warning");
        button3.innerHTML="Emploi ";
    
        var icon3 = document.createElement('i');
        icon3.setAttribute("class","fas fa-fw fa-clock");
        button3.appendChild(icon3);
    
        var button4 = document.createElement('button');
        button4.setAttribute("type","submit");
        button4.setAttribute("id",myObj[i].id);
        button4.setAttribute("onclick","location.href=('modifier.php?id="+myObj[i].id +"')");
        button4.setAttribute("class","btn btn-outline-primary");
        button4.innerHTML="Modifier ";
    
        var icon4 = document.createElement('i');
        icon4.setAttribute("class","fas fa-fw fa-edit");
        button4.appendChild(icon4);
    
        var button5 = document.createElement('button');
        button5.setAttribute("type","submit");
        button5.setAttribute("data-toggle","modal");
        button5.setAttribute("data-target","#confirmer");
        button5.setAttribute("class","btn btn-outline-danger");
        button5.setAttribute("id",myObj[i].id);
        button5.setAttribute("onclick","supprimer(this)");
        button5.innerHTML="Supprimer ";
    
        var icon5 = document.createElement('i');
        icon5.setAttribute("class","fas fa-fw fa-trash-alt");
        button5.appendChild(icon5);
    
        buttons.push(button1);
        buttons.push(button2);
        buttons.push(button3);
        buttons.push(button4);
        buttons.push(button5);

        var ligne=document.createElement('tr');

        var Nom=document.createElement('td');
        Nom.innerHTML = myObj[i].Nom;
        ligne.appendChild(Nom);
        var Prénom=document.createElement('td');
        Prénom.innerHTML = myObj[i].Prénom;
        ligne.appendChild(Prénom);

        var paiement=document.createElement('td');
        paiement.appendChild(buttons[0]);
        ligne.appendChild(paiement);

        var info=document.createElement('td');
        info.appendChild(buttons[1]);
        ligne.appendChild(info);

        var emploie=document.createElement('td');
        emploie.appendChild(buttons[2]);
        ligne.appendChild(emploie);

        var modifier=document.createElement('td');
        modifier.appendChild(buttons[3]);
        ligne.appendChild(modifier);

        var supprimer=document.createElement('td');
        supprimer.appendChild(buttons[4]);
        ligne.appendChild(supprimer);

        document.getElementById("tableauProf").appendChild(ligne);
    }
 
  }
};
xmlhttp.open("GET", "prof.php", true);
xmlhttp.send();


var JsonForm=[{ "id" : null,
                "nom" : null,
                "prénom" : null,
                "CIN" : null,
                "numero": null,
                "mail" : null,
                "date" : null,
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
    if ( niveaux.value === "Spécialité" || niveaux.value === "")
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
    var url;
    if((valider_nom())&&(valider_prenom())&&(valider_CIN())&&(valider_numero())
       &&(valider_mail())&&(valider_date())&&(valider_niveau()))
    {
            if(JsonForm.image=="")
            {
                url = "Formprof.php?nom="+JsonForm.nom+"&prénom="+JsonForm.prénom+"&CIN="+
                JsonForm.CIN+"&numero="+JsonForm.numero+"&mail="+JsonForm.mail+"&date="+JsonForm.date+"&niveau="+
                JsonForm.niveau;
            }
            else 
            {
                url = "Formprof.php?nom="+JsonForm.nom+"&prénom="+JsonForm.prénom+"&CIN="+
                JsonForm.CIN+"&numero="+JsonForm.numero+"&mail="+JsonForm.mail+"&date="+JsonForm.date+"&niveau="+
                JsonForm.niveau+"&image="+JsonForm.image;
            }
            
            

            document.getElementById("submitProf").setAttribute("data-toggle","modal");
            document.getElementById("submitProf").setAttribute("data-target","#Ajouter");

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                }
            };
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        
    }   
    else 
    {
        document.getElementById("submitProf").setAttribute("data-toggle","");
        document.getElementById("submitProf").setAttribute("data-target","");
        alert("Vous avez pas bien remplie les champs");
    }
    
}
function modifier_form(id)
{
    
    JsonForm.image  = document.getElementById("fileInput").value.replace("C:\\fakepath\\", "");
    var url;
    JsonForm.id = id;


    console.log(JsonForm.image);
    if((valider_nom())&&(valider_prenom())&&(valider_CIN())&&(valider_numero())
       &&(valider_mail())&&(valider_date())&&(valider_niveau()))
    {
        
            url = "ModifierForm.php?nom="+JsonForm.nom+"&prénom="+JsonForm.prénom+"&CIN="+
            JsonForm.CIN+"&numero="+JsonForm.numero+"&mail="+JsonForm.mail+"&date="+JsonForm.date+"&niveau="+
            JsonForm.niveau+"&image="+JsonForm.image+"&id="+JsonForm.id;

            document.getElementById("submitModifier").setAttribute("data-toggle","modal");
            document.getElementById("submitModifier").setAttribute("data-target","#Modifié");

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                }
            };
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        
    }   
    else 
    {
        alert("Vous avez pas bien remplie les champs");
        document.getElementById("submitModifier").setAttribute("data-toggle","");
        document.getElementById("submitModifier").setAttribute("data-target","");
       
    }
    
}

function vider()
{
    var tableau=[];
    tableau.push(document.getElementById("NomProf"));
    tableau.push(document.getElementById("prénomProf"));
    tableau.push(document.getElementById("numProf"));
    tableau.push(document.getElementById("emailProf"));
    tableau.push(document.getElementById("datenaissance"));
    tableau.push(document.getElementById("CINProf"));
    tableau.push(document.getElementById("niveaux"));
    for(var i=0;i<tableau.length;i++)
        empty(tableau[i]);
}

var JsonId=[{"id" : null}];
var clicked;
function supprimer(btn)
{
    clicked=btn;
    document.getElementById("deletebtn").setAttribute("onclick","deleted()");
}

function deleted()
{
   
    JsonId.id=clicked.getAttribute("id");
    console.log(clicked);
    var url = "updateProf.php?id="+JsonId.id;
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

        }
    };
    document.getElementById("deletebtn").setAttribute("data-dismiss","modal");
    clicked.parentElement.parentElement.remove();
    xmlhttp.open("GET", url, true);
    xmlhttp.send();

    location.reload();
}
