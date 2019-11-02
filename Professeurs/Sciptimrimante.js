
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    var myObj = JSON.parse(this.responseText);
    console.log(myObj);
    for(var i = 0; i<myObj.length ; i++)
    {
        var ligne=document.createElement('tr');

        var id_cours=document.createElement('td');
        id_cours.innerHTML = myObj[i].id_cours;
        ligne.appendChild(id_cours);

        var libellé_mat=document.createElement('td');
        libellé_mat.innerHTML = myObj[i].libellé_mat;
        ligne.appendChild(libellé_mat);

        var libellé_niv=document.createElement('td');
        libellé_niv.innerHTML = myObj[i].libellé_niv;
        ligne.appendChild(libellé_niv);

        var type=document.createElement('td');
        type.innerHTML = myObj[i].type;
        ligne.appendChild(type);

        var NbrHeureEnseingé=document.createElement('td');
        NbrHeureEnseingé.innerHTML = myObj[i].NbrHeureEnseingé;
        ligne.appendChild(NbrHeureEnseingé);

        var montant=document.createElement('td');
        montant.innerHTML = myObj[i].NbrHeureEnseingé * 200;
        ligne.appendChild(montant);

        document.getElementById("TableauImprimer").appendChild(ligne);
    }
 
}
};
xmlhttp.open("GET", "imprimer.php", true);
xmlhttp.send();