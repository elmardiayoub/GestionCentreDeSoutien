

reload();

function reload()
{

  deleteAll();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    
    if (this.readyState == 4 && this.status == 200) {
        var myObj = JSON.parse(this.responseText);
        // console.log(myObj);
        for(var i = 0; i<myObj.length ; i++)
        {
            
            var buttons = [];
            // var button1 = document.createElement('button');
            // button1.setAttribute("type","submit");
            
            // button1.setAttribute("onclick","location.href='#'");
            // button1.setAttribute("class","btn btn-outline-success");
            // button1.innerHTML="Charger ";

            // var icon1 = document.createElement('i');
            // icon1.setAttribute("class","fas fa-fw fa-money-bill");
            // button1.appendChild(icon1);
        
            // var button2 = document.createElement('button');
            // button2.setAttribute("type","submit");
            // button2.setAttribute("onclick","location.href='#'");
            // button2.setAttribute("class","btn btn-outline-dark");
            // button2.innerHTML="Plus d'info ";
        
            // var icon2 = document.createElement('i');
            // icon2.setAttribute("class","fas fa-fw fa-info-circle");
            // button2.appendChild(icon2);
        
            // var button3 = document.createElement('button');
            // button3.setAttribute("type","submit");
            // button3.setAttribute("onclick","location.href='#'");
            // button3.setAttribute("class","btn btn-outline-warning");
            // button3.innerHTML="Emploie ";
        
            // var icon3 = document.createElement('i');
            // icon3.setAttribute("class","fas fa-fw fa-clock");
            // button3.appendChild(icon3);
        
            var button4 = document.createElement('button');
            button4.setAttribute("type","submit");
            button4.setAttribute("onclick","addAppr("+getCookie('id_cours')+","+myObj[i].id_app+")");
            button4.setAttribute("class","btn btn-outline-primary");
            button4.innerHTML="Ajouter ";
        
            var icon4 = document.createElement('i');
            icon4.setAttribute("class","fas fa-fw fa-plus");
            button4.appendChild(icon4);
        
        
            // buttons.push(button1);
            // buttons.push(button2);
            // buttons.push(button3);
            buttons.push(button4);


            var ligne=document.createElement('tr');

            var Nom=document.createElement('td');
            Nom.innerHTML = myObj[i].Nom;
            ligne.appendChild(Nom);

            var Prénom=document.createElement('td');
            Prénom.innerHTML = myObj[i].Prénom;
            ligne.appendChild(Prénom);

            // var Facturation=document.createElement('td');
            // Facturation.appendChild(buttons[0]);
            // ligne.appendChild(Facturation);

            // var details=document.createElement('td');
            // details.appendChild(buttons[1]);
            // ligne.appendChild(details);

            // var Emploie=document.createElement('td');
            // Emploie.appendChild(buttons[2]);
            // ligne.appendChild(Emploie);

            var Ajouter=document.createElement('td');
            Ajouter.appendChild(buttons[0]);
            ligne.appendChild(Ajouter);


        // console.log(myObj);

            document.getElementById("tableauAppr").appendChild(ligne);
        }
    
    }
    };
    xmlhttp.open("GET", "apprData.php?id_req=1&id_cours="+getCookie('id_cours'), true);
    xmlhttp.send();

    // deleteAll();
    // reload2();

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    
    if (this.readyState == 4 && this.status == 200) {
        var myObj = JSON.parse(this.responseText);
        // console.log(myObj);
        for(var i = 0; i<myObj.length ; i++)
        {
            
            var buttons = [];
            // var button1 = document.createElement('button');
            // button1.setAttribute("type","submit");
            
            // button1.setAttribute("onclick","location.href='#'");
            // button1.setAttribute("class","btn btn-outline-success");
            // button1.innerHTML="Charger ";

            // var icon1 = document.createElement('i');
            // icon1.setAttribute("class","fas fa-fw fa-money-bill");
            // button1.appendChild(icon1);
        
            // var button2 = document.createElement('button');
            // button2.setAttribute("type","submit");
            // button2.setAttribute("onclick","location.href='#'");
            // button2.setAttribute("class","btn btn-outline-dark");
            // button2.innerHTML="Plus d'info ";
        
            // var icon2 = document.createElement('i');
            // icon2.setAttribute("class","fas fa-fw fa-info-circle");
            // button2.appendChild(icon2);
        
            // var button3 = document.createElement('button');
            // button3.setAttribute("type","submit");
            // button3.setAttribute("onclick","location.href='#'");
            // button3.setAttribute("class","btn btn-outline-warning");
            // button3.innerHTML="Emploie ";
        
            // var icon3 = document.createElement('i');
            // icon3.setAttribute("class","fas fa-fw fa-clock");
            // button3.appendChild(icon3);
        
            var button4 = document.createElement('button');
            button4.setAttribute("type","submit");
            button4.setAttribute("onclick","delAppr("+getCookie('id_cours')+","+myObj[i].id_app+")");
            button4.setAttribute("class","btn btn-outline-danger");
            button4.innerHTML="Supprimer ";
        
            var icon4 = document.createElement('i');
            icon4.setAttribute("class","fas fa-fw fa-minus");
            button4.appendChild(icon4);
        
        
            // buttons.push(button1);
            // buttons.push(button2);
            // buttons.push(button3);
            buttons.push(button4);


            var ligne=document.createElement('tr');

            var Nom=document.createElement('td');
            Nom.innerHTML = myObj[i].Nom;
            ligne.appendChild(Nom);

            var Prénom=document.createElement('td');
            Prénom.innerHTML = myObj[i].Prénom;
            ligne.appendChild(Prénom);

            // var Facturation=document.createElement('td');
            // Facturation.appendChild(buttons[0]);
            // ligne.appendChild(Facturation);

            // var details=document.createElement('td');
            // details.appendChild(buttons[1]);
            // ligne.appendChild(details);

            // var Emploie=document.createElement('td');
            // Emploie.appendChild(buttons[2]);
            // ligne.appendChild(Emploie);

            var Ajouter=document.createElement('td');
            Ajouter.appendChild(buttons[0]);
            ligne.appendChild(Ajouter);


        // console.log(document.getElementById("appr_concérné"));

            document.getElementById("appr_concérné").appendChild(ligne);
        }
    
    }
    };
    xmlhttp.open("GET", "apprData.php?id_req=4&id_cours="+getCookie('id_cours'), true);
    xmlhttp.send();


   
}

function deleteAll()
{

    var myNode = document.getElementById("tableauAppr");
    while (myNode.firstChild) {
        myNode.removeChild(myNode.firstChild);
    }
    myNode = document.getElementById("appr_concérné");
    while (myNode.firstChild) {
        myNode.removeChild(myNode.firstChild);
    }
}
// function reload2()
// {


    
    

// }


function delAppr(id_cours,id_app)
{
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
      
      if (this.readyState == 4 && this.status == 200) {
        
        
        reload();
      
      }
      };
      xmlhttp.open("GET", "apprData.php?id_req=5&id_cours="+id_cours+"&id_appr="+id_app, true);
      xmlhttp.send();
}



function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }



function addAppr(id_cours,id_app)
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    
    if (this.readyState == 4 && this.status == 200) {
        var myObj = JSON.parse(this.responseText);
        
        if(myObj.isPossible === "true")
          insert(id_cours,id_app);
        else if (myObj.type === "ind")  
          alert("Déja remplie! le nombre maximum est un seul apprenant");
        else if (myObj.type === "grp")  
          alert("Déja remplie! le nombre maximum est 9 apprenants");
    }
    };
    xmlhttp.open("GET", "apprData.php?id_req=2&id_cours="+id_cours+"&id_appr="+id_app, true);
    xmlhttp.send();
}


function insert(id_cours,id_app)
{

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    
    if (this.readyState == 4 && this.status == 200) {
       
      
      reload();
    
    }
    };
    xmlhttp.open("GET", "apprData.php?id_req=3&id_cours="+id_cours+"&id_appr="+id_app, true);
    xmlhttp.send();
}

