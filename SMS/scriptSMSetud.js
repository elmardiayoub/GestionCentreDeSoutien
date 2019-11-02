
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

        var num=document.createElement('td');
        num.innerHTML = myObj[i].Num_tel;
        ligne.appendChild(num);

         var date=document.createElement('td');
        date.innerHTML = myObj[i].date;
        ligne.appendChild(date);

        var cont=document.createElement('td');
        if(myObj[i].msg_contenu!=null )
                 cont.innerHTML = myObj[i].msg_contenu;
        else if(myObj[i].modele_contenu!=null)
                cont.innerHTML = myObj[i].modele_contenu;
        ligne.appendChild(cont);


        document.getElementById("Liste-app").appendChild(ligne);
    }
 
  }
};
xmlhttp.open("GET", "requete/sms_envoyés_etud.php", true);
xmlhttp.send();