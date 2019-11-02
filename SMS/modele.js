
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  
  if (this.readyState == 4 && this.status == 200) {
    var myObj = JSON.parse(this.responseText);
    
    for(var i = 0; i<myObj.length ; i++)
    {
        var buttons = [];
    
      /*  var button1 = document.createElement('button');
        button1.setAttribute("type","submit");
        button1.setAttribute("id",myObj[i].id_modele);
        button1.setAttribute("onclick","location.href=('détails.php?id="+myObj[i].id_modele+"')");
        button1.setAttribute("class","btn btn-outline-dark");
        button1.innerHTML="Plus d'info ";*/
    
       /* var icon1 = document.createElement('i');
        icon1.setAttribute("class","far fa-address-book");
        button1.appendChild(icon1);*/
    
        var button2 = document.createElement('button');
        button2.setAttribute("type","submit");
        button2.setAttribute("id",myObj[i].id_modeles);
        ///garder l id_modele pour selectionner apres les contacts :
        var lik="new-txt="+myObj[i].modele_contenu +"&id="+myObj[i].id_modele;
        button2.setAttribute("onclick","location.href=('contact.php?"+lik+"')");
        button2.setAttribute("class","btn btn-outline-success");
        button2.innerHTML="Envoyer";
    
        var icon2 = document.createElement('i');
        icon2.setAttribute("class","fas fa-fw fa-location-arrow");
        button2.appendChild(icon2);
    
        var button3 = document.createElement('button');
        button3.setAttribute("type","submit");
        button3.setAttribute("id",myObj[i].id_modele);
        var set= "id="+myObj[i].id_modele+"&text="
            +myObj[i].modele_contenu ;
        button3.setAttribute("onclick",
            "location.href=('./addmodele.php?"+set +"')");
        button3.setAttribute("class","btn btn-outline-primary");
        button3.innerHTML="Modifier ";
    
        var icon3 = document.createElement('i');
        icon3.setAttribute("class","fas fa-fw fa-edit");
        button3.appendChild(icon3);
    
        var button4 = document.createElement('button');
        button4.setAttribute("type","submit");
        button4.setAttribute("data-toggle","modal");
        button4.setAttribute("data-target","#confirmer");
        button4.setAttribute("class","btn btn-outline-danger");
        button4.setAttribute("id",myObj[i].id_modele);
        button4.setAttribute("onclick","supprimer(this)");
        button4.innerHTML="Supprimer ";
    
        var icon4 = document.createElement('i');
        icon4.setAttribute("class","fas fa-fw fa-trash-alt");
        button4.appendChild(icon4);
    
       // buttons.push(button1);
        buttons.push(button2);
        buttons.push(button3);
        buttons.push(button4);
        //buttons.push(button5);

        var ligne=document.createElement('tr');

        var num=document.createElement('td');
        num.innerHTML = myObj[i].id_modele;
        ligne.appendChild(num);

        var modele_contenu=document.createElement('td');
        modele_contenu.innerHTML = myObj[i].modele_contenu;
        ligne.appendChild(modele_contenu);
        
        var par=document.createElement('td');
        par.innerHTML = myObj[i].username;
        ligne.appendChild(par);

        var date_ajout=document.createElement('td');
        date_ajout.innerHTML = myObj[i].date_ajout;
        ligne.appendChild(date_ajout);

        var b1=document.createElement('td');
        b1.appendChild(buttons[0]);
        ligne.appendChild(b1);

      /*  var info=document.createElement('td');
        info.appendChild(buttons[1]);
        ligne.appendChild(info);*/

        var modifier=document.createElement('td');
        modifier.appendChild(buttons[1]);
        ligne.appendChild(modifier);

        var supprimer=document.createElement('td');
        supprimer.appendChild(buttons[2]);
        ligne.appendChild(supprimer);

        document.getElementById("modele").appendChild(ligne);
    }
 
  }
};
xmlhttp.open("GET", "requete/req_modele.php", true);
xmlhttp.send();


var clicked;
function supprimer(btn)
{
    clicked=btn;
    document.getElementById("deletebtn").setAttribute("onclick","deleted()");
}

function deleted()
{


    var url = "updateSMS.php?id="+clicked.getAttribute("id");
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    };
    document.getElementById("deletebtn").setAttribute("data-dismiss","modal");
    clicked.parentElement.parentElement.remove();
    xmlhttp.open("GET", url, true);
    xmlhttp.send();

    location.reload();
}
