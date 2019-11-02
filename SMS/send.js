function rechercher_numero(str) {
  if (str.length==0) { 
    document.getElementById("err_num").innerHTML="";
    //document.getElementById("num").style.border="0px";
    return;
  }
 var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  
  if (this.readyState == 4 && this.status == 200) {
    var myObj = JSON.parse(this.responseText);
    
    for(var i = 0; i<myObj.length ; i++)
    {
         ligne=document.getElementById('err_num');
      
      if(myObj[i].Numtele!=null){
       var op=document.createElement("option");
      op.innerHTML=myObj[i].Numtele;
      ligne.appendChild(op);
    }
       if(myObj[i].Num_tel!=null){
        var op1=document.createElement("option");
      op1.innerHTML=myObj[i].Num_tel;
      ligne.appendChild(op1);
    }
  }
  }
  xmlhttp.open("GET","requete/send.php?num="+str,true);
  xmlhttp.send();
}
}

function rechercher_nom(str) {
  if (str.length==0) { 
    document.getElementById("err_nom").innerHTML="";
    //document.getElementById("num").style.border="0px";
    return;
  }
 var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  
  if (this.readyState == 4 && this.status == 200) {
    var myObj = JSON.parse(this.responseText);
    
    for(var i = 0; i<myObj.length ; i++)
    {

      ligne=document.getElementById('err_nom');
     // ligne.style.display="block ";
      if(myObj[i].Nom!=null){
       var op=document.createElement("option");
      op.innerHTML=myObj[i].Nom;
      ligne.appendChild(op);
    }
       if(myObj[i].Prénom!=null){
        var op1=document.createElement("option");
      op1.innerHTML=myObj[i].Prénom;
      ligne.appendChild(op1);
    }
  }
}
}
 
  xmlhttp.open("GET","requete/send.php?nom="+str,true);
  xmlhttp.send();
}
/*
