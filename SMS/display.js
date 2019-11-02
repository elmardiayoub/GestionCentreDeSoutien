var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  
  if (this.readyState == 4 && this.status == 200) {
    var myObj = JSON.parse(this.responseText);
    
    for(var i = 0; i<myObj.length ; i++)
    {
        var ligne=document.getElementById('modele');
        var button = document.createElement('option');
        button.setAttribute("id",myObj[i].id_modele);
        button.innerHTML=myObj[i].modele_contenu ;
      ligne.appendChild(button);
 }
  }
};
function run(){
    // body...
var ligne=document.getElementById('modele');

        var message=document.getElementById("message");
        message.innerHTML=ligne.options[ligne.selectedIndex].value;
}
xmlhttp.open("GET", "requete/req_modele.php", true);
xmlhttp.send();

