var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    console.log(this.responseText);
    var myObj = JSON.parse(this.responseText);
    
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

        var HrEns = document.createElement('td');
        HrEns.innerHTML =myObj[i].Nbr_seance;
        ligne.appendChild(HrEns);
        
        var HrEns = document.createElement('td');
        if(myObj[i].type == "grp") 
        HrEns.innerHTML =myObj[i].prix_etd_grp;
        else 
          HrEns.innerHTML =myObj[i].prix_etd_ind;
        ligne.appendChild(HrEns);

        var montant = document.createElement('td');
        var input=document.createElement('input');
        input.setAttribute("type","number");
        input.setAttribute("name","input[]");
        input.setAttribute("id",myObj[i].id_cours);
        input.setAttribute("disabled","disabled");

        montant.appendChild(input);
        ligne.appendChild(montant);

        
        var a_payer=document.createElement('td');
        var check=document.createElement('input');
        check.setAttribute("style","width:20px; height:20px;");
        check.setAttribute("onclick","handleChange(this,"+myObj[i].id_cours+")");
        check.setAttribute("type","checkbox");
        
        

        check.setAttribute("value", myObj[i].id_cours);
        check.setAttribute("name","check[]");
        if(myObj[i].Nbr_seance>=0)
        check.disabled=false;


        a_payer.appendChild(check); 
        ligne.appendChild(a_payer);

        document.getElementById("tableauPaiement").appendChild(ligne);
    }
 
}
};
xmlhttp.open("GET", "PaiementBD.php", true);
xmlhttp.send();

function handleChange(checkbox,id) {
  if(checkbox.checked == true){
      document.getElementById(id).removeAttribute("disabled");
  }else{
      document.getElementById(id).setAttribute("disabled", "disabled");
 }
}

var Jsonpdf=[];
function CheckState(Nom,Prénom)
{
         Jsonpdf=[];
        var inputs = document.querySelectorAll('input[type=checkbox]:checked');
        var inputsLength = inputs.length;
        for (var i = 0; i < inputsLength; i++) {
            var Objet = {
                        "id_cours" : null,
                        "Matière" : null,
                        "Niveau" : null,
                        "type" : null,
                        "HeureEnseigné" : null,
                        "date" : null,
                        "montant" : null
              };
              
            var today = new Date();
            var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
            var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
            var dateTime = date+' '+time;
            var cellules  = inputs[i].parentElement.parentElement.cells;
            Objet.id_cours = cellules[0].textContent;
            Objet.Matière = cellules[1].textContent;
            Objet.Niveau = cellules[2].textContent;
            Objet.type = cellules[3].textContent;
            Objet.HeureEnseigné = cellules[4].textContent;
            //réinitialisation du compteur des heureus enseingées :
            cellules[4].textContent=0+" h";
            Objet.date = dateTime;

            Objet.montant = parseInt(Objet.HeureEnseigné)*200+"DH";
            Jsonpdf.push(Objet);
        }


      console.log(Jsonpdf);
      //  document.getElementById("Titre").innerHTML = Nom;
}


var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    console.log(this.responseText);
    var myObj = JSON.parse(this.responseText);
    
    for(var i = 0; i<myObj.length ; i++)
    {
        var ligne=document.createElement('tr');

        var date=document.createElement('td');
        date.innerHTML = myObj[i].date;

        ligne.appendChild(date);


        var lientd=document.createElement('td');
        var lien=document.createElement('a');
        lien.setAttribute("id",myObj[i].id_facture);
        lien.innerHTML = "Link";
        if(myObj[i].inscription == 1)
        lien.setAttribute("href","InscriptionPaiement.php?id="+myObj[i].id_facture); 
        else 
        lien.setAttribute("href","imprimer.php?id="+myObj[i].id_facture);
        
        lientd.appendChild(lien);

        ligne.appendChild(lientd);

        document.getElementById("HistoPaiement").appendChild(ligne);
    }
 
}
};
xmlhttp.open("GET", "HistoPaiementBD.php", true);
xmlhttp.send();