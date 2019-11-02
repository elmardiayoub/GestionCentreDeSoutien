
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  
  if (this.readyState == 4 && this.status == 200) {
    var myObj1 = JSON.parse(this.responseText);
    
    for(var i = 0; i<myObj1.length ; i++)
    {

        var ligne=document.createElement('tr');

        var Nom=document.createElement('td');
        Nom.innerHTML = myObj1[i].Nom;
        ligne.appendChild(Nom);

        var Prénom=document.createElement('td');
        Prénom.innerHTML = myObj1[i].Prénom;
        ligne.appendChild(Prénom);

        if(myObj1[i].Numtele!=null){
        var num=document.createElement('td');
        num.innerHTML = myObj1[i].Numtele;
        ligne.appendChild(num);
    }

         var date=document.createElement('td');
        date.innerHTML = myObj1[i].date;
        ligne.appendChild(date);

        var cont=document.createElement('td');
        if(myObj1[i].msg_contenu != null )
                 cont.innerHTML = myObj1[i].msg_contenu ;
        else if(myObj1[i].modele_contenu != null)
                cont.innerHTML = myObj1[i].modele_contenu;
        else 
                cont.innerHTML="Message Vide"; /// it'll never go here
        ligne.appendChild(cont);

        document.getElementById("Liste-prof").appendChild(ligne);
    }
 
  }
};
xmlhttp.open("GET", "requete/sms_envoyés_prof.php", true);
xmlhttp.send();