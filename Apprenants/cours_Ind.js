

reload();

function reload()
{

  deleteAll();

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    
    if (this.readyState == 4 && this.status == 200) {
        var myObj = JSON.parse(this.responseText);
        
        for(var i = 0; i<myObj.length ; i++)
        {
            


            var ligne=document.createElement('tr');

            var Nom=document.createElement('td');
            Nom.innerHTML = myObj[i].Nom;
            ligne.appendChild(Nom);

            var Prénom=document.createElement('td');
            Prénom.innerHTML = myObj[i].Prénom;
            ligne.appendChild(Prénom);


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

    myNode = document.getElementById("appr_concérné");
    while (myNode.firstChild) {
        myNode.removeChild(myNode.firstChild);
    }
}


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

