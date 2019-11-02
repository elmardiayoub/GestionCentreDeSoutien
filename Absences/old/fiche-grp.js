var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  
  if (this.readyState == 4 && this.status == 200) {
    var myObj = JSON.parse(this.responseText);
    
    for(var i = 0; i<myObj.length ; i++)
    {
       // [identif][check][cin][name..]
      	var head=document.getElementsByTagName('tr');
      //	var foot=document.getElementsByTagName('tfoot');
        var button1 = document.createElement('th');
        button1.innerHTML="Identifiant";
        head[0].appendChild(button1);
         var button2 = document.createElement('th');
        button2.innerHTML="Identifiant";
        head[1].appendChild(button2);
         var th = document.createElement('th');
     
       /*  var button3 = document.createElement('input');
        button3.setAttribute("type","checkbox");
        button3.setAttribute("id","selectionner");
        button3.setAttribute("name","selectionner");
        button3.setAttribute("onclick","chech(this.checked)");
       // button2.setAttribute("c","btn btn-outline-dark");*/
       
        th.innerHTML="Tout Selectionner  ";
        th.appendChild(button3);
        
        head[0].appendChild(th);

	var th2 = document.createElement('th');
          var button4 = document.createElement('input');
        button4.setAttribute("type","checkbox");
        button4.setAttribute("id","selectionner");
        button4.setAttribute("name","selectionner");
        button4.setAttribute("onclick","chech(this.checked)");
           // button4.setAttribute("value","Tout Selectionner");
        
        th2.innerHTML="Tout Selectionner  ";
            th2.appendChild(button4);
        
        head[1].appendChild(th2);

      var th556 = document.createElement('th');
        th556.innerHTML="CIN" ;
        head[0].appendChild(th556);

       var th55 = document.createElement('th');
        th55.innerHTML="CIN" ;
        head[1].appendChild(th55);
  var th5567 = document.createElement('th');
        th5567.innerHTML="Nom et Prénom" ;
        head[0].appendChild(th5567);

       var th557 = document.createElement('th');
        th557.innerHTML="Nom et Prénom"  ;
        head[1].appendChild(th557);
//// une nouvelle ligne ::
        var ligne = document.createElement('tr');
        if(myObj[i].id_app===null)
	document.getElementById('save').style.display="none";
         var case1 = document.createElement('td');
         if(myObj[i].id_app!=null){
         	
        case1.innerHTML=myObj[i].id_app;

        var case2= document.createElement('td');
       /*	var in=document.createElement('input');
       	in.setAttribute('type','checkbox');
       	in.setAttribute("id",myObj[i].id_app);
       	case2.appendChild(in);*/

 var case3 = document.createElement('td');

        case3.innerHTML=myObj[i].CIN;

 var case4 = document.createElement('td');

        case4.innerHTML=myObj[i].Nom + " " +myObj[i].Prénom;
        ligne.appendChild(case1);
        ligne.appendChild(case2);
        ligne.appendChild(case3);
        ligne.appendChild(case4);

}
        document.getElementById("tableau-fiche").appendChild(ligne);
}
}
};

var something=window.location.href;
something =something.split("=",2);
if(something[0]==="grp") alert("grp");
	xmlhttp.open("GET", "requete/tableau_init.php?grp="+something[1], true);

xmlhttp.send();
