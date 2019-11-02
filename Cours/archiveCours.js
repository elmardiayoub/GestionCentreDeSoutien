
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  
  if (this.readyState == 4 && this.status == 200) {
    var myObj = JSON.parse(this.responseText);
    console.log(this.responseText);
    for(var i = 0; i<myObj.length ; i++)
    {
        
        var buttons = [];
        var button1 = document.createElement('button');
        button1.setAttribute("type","submit");
        var icon1 = document.createElement('i');
        if(myObj[i].type === 'ind'){
            button1.setAttribute("onclick","location.href='cours_Ind.php?type=ind&id_cours="+myObj[i].id_cours+"'");
            button1.setAttribute("class","btn btn-outline-success");
            // button1.innerHTML="Individuel ";
            icon1.setAttribute("class","fas fa-fw fa-user");
        }else if(myObj[i].type === 'grp') {
            button1.setAttribute("onclick","location.href='cours_Ind.php?type=grp&id_cours="+myObj[i].id_cours+"'");
            button1.setAttribute("class","btn btn-outline-success");
            // button1.innerHTML="En Groupe ";
            icon1.setAttribute("class","fas fa-fw fa-users");
        }
          button1.appendChild(icon1);
    
        // var button2 = document.createElement('button');
        // button2.setAttribute("type","submit");
        // button2.setAttribute("onclick","location.href='#'");
        // button2.setAttribute("class","btn btn-outline-dark");
        // // button2.innerHTML="Plus d'info ";
    
        // var icon2 = document.createElement('i');
        // icon2.setAttribute("class","fas fa-fw fa-info-circle");
        // button2.appendChild(icon2);
    
        // var button3 = document.createElement('button');
        // button3.setAttribute("type","submit");
        // button3.setAttribute("onclick","location.href='#'");
        // button3.setAttribute("class","btn btn-outline-warning");
        // // button3.innerHTML="Programmer ";
    
        // var icon3 = document.createElement('i');
        // icon3.setAttribute("class","fas fa-fw fa-calendar");
        // button3.appendChild(icon3);
    
        // var button4 = document.createElement('button');
        // button4.setAttribute("type","submit");
        // // button4.setAttribute("onclick","location.href='#'");
        // button4.setAttribute("id_cours",myObj[i].id_cours);
        // button4.setAttribute("class","btn btn-outline-primary edit_data");
        // // button4.innerHTML="Modifier ";
    
        // var icon4 = document.createElement('i');
        // icon4.setAttribute("class","fas fa-fw fa-edit");
        // button4.appendChild(icon4);
    
        // var button5 = document.createElement('button');
        // button5.setAttribute("type","submit");
        // button5.setAttribute("data-toggle","modal");
        // button5.setAttribute("data-target","#confirmer");
        // button5.setAttribute("id",myObj[i].id_cours);
        // button5.setAttribute("onclick","supprimer(this)");
        // button5.setAttribute("class","btn btn-outline-danger");
        // // button5.innerHTML="Supprimer ";
    
        // var icon5 = document.createElement('i');
        // icon5.setAttribute("class","fas fa-fw fa-trash-alt");
        // button5.appendChild(icon5);

            
        var button5 = document.createElement('button');
        button5.setAttribute("type","submit");
        // button5.setAttribute("data-toggle","modal");
        // button5.setAttribute("data-target","#confirmer");
        button5.setAttribute("id",myObj[i].id_cours);
        button5.setAttribute("class","btn btn-primary");
        button5.setAttribute("onclick","retourner(this)");
        button5.innerHTML="Retourner ";
    
        var icon5 = document.createElement('i');
        // icon5.setAttribute("class","fas fa-fw fa");
        button5.appendChild(icon5);
    
        buttons.push(button1);
        // buttons.push(button2);
        // buttons.push(button3);
        // buttons.push(button4);
        buttons.push(button5);

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

        var type=document.createElement('td');
        type.appendChild(buttons[0]);
        ligne.appendChild(type);

        var retourner=document.createElement('td');
        retourner.appendChild(buttons[1]);
        ligne.appendChild(retourner);

        // var programmer=document.createElement('td');
        // programmer.appendChild(buttons[1]);
        // ligne.appendChild(programmer);

        // var modifier=document.createElement('td');
        // modifier.appendChild(buttons[2]);
        // ligne.appendChild(modifier);

        // var supprimer=document.createElement('td');
        // supprimer.appendChild(buttons[3]);
        // ligne.appendChild(supprimer);


      console.log(myObj);

        document.getElementById("ArchiveCours").appendChild(ligne);
    }
 
  }
};
xmlhttp.open("GET", "CoursData.php?archive=1", true);
xmlhttp.send();



function retourner(clicked)
{
   
    // console.log(clicked);
    var url = "CoursData.php?retourner="+clicked.getAttribute("id");;
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
        }
    };
    clicked.parentElement.parentElement.remove();
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}