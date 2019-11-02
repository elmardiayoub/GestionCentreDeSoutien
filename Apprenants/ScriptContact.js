var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  
  if (this.readyState == 4 && this.status == 200) {
    var myObj = JSON.parse(this.responseText);
    for(var i = 0; i<myObj.length ; i++)
    {
        var buttons = [];
    
        var button2 = document.createElement('button');
        button2.setAttribute("type","submit");
        button2.setAttribute("id",myObj[i].id);
        button2.setAttribute("onclick","location.href=('détails.php?id="+myObj[i].id_app+"')");
        button2.setAttribute("class","btn btn-outline-dark");
        button2.innerHTML="Plus d'info ";
    
        var icon2 = document.createElement('i');
        icon2.setAttribute("class","fas fa-fw fa-info-circle");
        button2.appendChild(icon2);
    
        var button4 = document.createElement('button');
        button4.setAttribute("type","submit");
        button4.setAttribute("id",myObj[i].id);
        button4.setAttribute("onclick","location.href=('modifier.php?id="+myObj[i].id_app +"')");
        button4.setAttribute("class","btn btn-outline-success");
        button4.innerHTML="Modifier ";
    
        var icon4 = document.createElement('i');
        icon4.setAttribute("class","fas fa-fw fa-edit");
        button4.appendChild(icon4);
        
        var button5 = document.createElement('button');
        button5.setAttribute("type","submit");
        button5.setAttribute("id",myObj[i].id);
        var donnes ="req=2&nom="+myObj[i].Nom+"&prénom="+myObj[i].Prénom+"&email="+myObj[i].email+"&num="+myObj[i].Num_tel;
        button5.setAttribute("onclick","location.href=('AjouterAppr.php?"+donnes+"')");
        button5.setAttribute("class","btn btn-outline-primary");
        button5.innerHTML="Apprenant +";
    
        var icon4 = document.createElement('i');
        icon4.setAttribute("class","fas fa-fw fa-add");
        button5.appendChild(icon4);
    
        buttons.push(button2);
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
        info.appendChild(buttons[0]);
        ligne.appendChild(info);

        var modifier=document.createElement('td');
        modifier.appendChild(buttons[1]);
        ligne.appendChild(modifier);

        var modifier=document.createElement('td');
        modifier.appendChild(buttons[2]);
        ligne.appendChild(modifier);



        document.getElementById("tableauContact").appendChild(ligne);
    }
 
  }
};
xmlhttp.open("GET", "Contact.php", true);
xmlhttp.send();