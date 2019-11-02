var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  
  if (this.readyState == 4 && this.status == 200) {
    var myObj = JSON.parse(this.responseText);
    
    for(var i = 0; i<myObj.length ; i++)
    {
       //console.log(myObj[i]);
      if(myObj[i].id_groupe!=null){
       // alert('hello');
      
        var button1 = document.createElement('td');
        button1.innerHTML="groupe "+myObj[i].id_groupe;
         var button2 = document.createElement('button');
        button2.setAttribute("type","submit");
        //button1.setAttribute("id",myObj[i].id);
        button2.setAttribute("onclick","location.href=('fiche-grp.php?grp="+myObj[i].id_groupe+"')");
        button2.setAttribute("class","btn btn-outline-dark");
        button2.innerHTML="fiche grp"+myObj[i].id_groupe;
      }
      else if(myObj[i].id!=null ){
         var button1 = document.createElement('td');

        button1.innerHTML=myObj[i].Prénom+" "+myObj[i].Nom;

         var button2 = document.createElement('button');
        button2.setAttribute("type","submit");
        //button1.setAttribute("id",myObj[i].id);
        button2.setAttribute("onclick","location.href=('fiche-prof.php?prof="+myObj[i].id+"')");
        button2.setAttribute("class","btn btn-outline-dark");
        button2.innerHTML="fiche prof"+myObj[i].id;

      }
       else if(myObj[i].id_app!=null ){
         var button1 = document.createElement('td');
        button1.innerHTML=myObj[i].Prénom+" "+myObj[i].Nom;

         var button2 = document.createElement('button');
        button2.setAttribute("type","submit");
        //button1.setAttribute("id",myObj[i].id);
        button2.setAttribute("onclick","location.href=('fiche-app.php?app="+myObj[i].id_app+"')");
        button2.setAttribute("class","btn btn-outline-dark");
        button2.innerHTML="fiche app"+myObj[i].id_app;

      }
       var ligne=document.createElement('tr');

       // newone.appendChild(button1);
        ligne.appendChild(button1);
        var newone2=document.createElement("td");
        newone2.appendChild(button2);
        ligne.appendChild(newone2);

        document.getElementById("tableau").appendChild(ligne);

}
}
};
var something=window.location.href;
something =something.split("=",2);
      xmlhttp.open("GET", "requete/tableau_init.php?q="+something[1], true);
xmlhttp.send();
