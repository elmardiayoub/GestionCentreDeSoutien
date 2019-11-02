function chech(etat) {
	// body...
var liste=document.getElementsByTagName('input');
var check = document.getElementById("selectionner").checked;
 if(check===true)
 {
      for (var i = 1 ; i < liste.length ; i++) {
      	if(liste[i].type=='checkbox')
        liste[i].checked=etat;
      }
 }
 else
 {
 	 for (var i = 1 ; i < liste.length ; i++) {
      	if(liste[i].type=='checkbox')
        liste[i].checked=false;
      }
 }
 return;
}

