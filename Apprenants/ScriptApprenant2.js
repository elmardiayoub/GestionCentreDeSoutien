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
        button1.setAttribute("onclick","location.href=('facturation.php?id="+myObj[i].id_app+"')");
        button1.setAttribute("class","btn btn-outline-success");
        button1.innerHTML="Facturation ";
    
        var icon1 = document.createElement('i');
        icon1.setAttribute("class","fas fa-fw fa-money-bill");
        button1.appendChild(icon1);
    
        var button2 = document.createElement('button');
        button2.setAttribute("type","submit");
        button2.setAttribute("id",myObj[i].id);
        button2.setAttribute("onclick","location.href=('détails.php?id="+myObj[i].id_app+"')");
        button2.setAttribute("class","btn btn-outline-dark");
        button2.innerHTML="Plus d'info ";
    
        var icon2 = document.createElement('i');
        icon2.setAttribute("class","fas fa-fw fa-info-circle");
        button2.appendChild(icon2);
    
        var button3 = document.createElement('button');
        button3.setAttribute("type","submit");
        button3.setAttribute("id",myObj[i].id);
        button3.setAttribute("onclick","location.href=('emploie.php?id="+myObj[i].id_app +"')");
        button3.setAttribute("class","btn btn-outline-warning");
        button3.innerHTML="Emploi ";
    
        var icon3 = document.createElement('i');
        icon3.setAttribute("class","fas fa-fw fa-clock");
        button3.appendChild(icon3);
    
        var button4 = document.createElement('button');
        button4.setAttribute("type","submit");
        button4.setAttribute("id",myObj[i].id);
        button4.setAttribute("onclick","location.href=('modifier.php?id="+myObj[i].id_app +"')");
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
        button5.setAttribute("id",myObj[i].id_app);
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

        
        var info=document.createElement('td');
        info.appendChild(buttons[1]);
        ligne.appendChild(info);


        var emploie=document.createElement('td');
        emploie.appendChild(buttons[2]);
        ligne.appendChild(emploie);

        var Facturation=document.createElement('td');
        Facturation.appendChild(buttons[0]);
        ligne.appendChild(Facturation);

        var modifier=document.createElement('td');
        modifier.appendChild(buttons[3]);
        ligne.appendChild(modifier);

        var supprimer=document.createElement('td');
        supprimer.appendChild(buttons[4]);
        ligne.appendChild(supprimer);

        document.getElementById("tableauAppr2").appendChild(ligne);
    }
 
  }
};
xmlhttp.open("GET", "Appr2.php", true);
xmlhttp.send();
