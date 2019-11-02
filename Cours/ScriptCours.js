



// const addHorBtn = document.getElementById('add_hor');

// console.log(addHorBtn);

// addHorBtn.addEventListener('click', addHor);


function addHor(btn){

  // console.log("fffff");

  var selectJour = document.createElement('select');
  // var selectHor  = document.createElement('select');
  var début  = document.createElement('input');
  début.setAttribute("type", "time");
  var fin  = document.createElement('input');
  fin.setAttribute("type", "time");

  selectJour.setAttribute("name", "jour[]");
  selectJour.setAttribute("id", "jour");
  selectJour.setAttribute("class", "form-control");

  début.setAttribute("name", "début[]");
  début.setAttribute("id", "début");
  début.setAttribute("class", "form-control");

  fin.setAttribute("name", "fin[]");
  fin.setAttribute("id", "fin");
  fin.setAttribute("class", "form-control");

  joursData();
  // horaireData();

  jours = JSON.parse(localStorage.getItem("jours"));
  localStorage.removeItem("jours");


  // horaires = JSON.parse(localStorage.getItem("horaire"));
  // localStorage.removeItem("horaire");


  // console.log(jours);
  // console.log(horaires);
  jours.forEach(function(jour) {
    option = document.createElement('option');
    option.setAttribute("value", jour.id_jours);
    option.innerHTML = jour.jour;
    selectJour.appendChild(option); 
  });

  // horaires.forEach(function(horaire) {
  //   option = document.createElement('option');
  //   option.setAttribute("value", horaire.id_horaire);
  //   option.innerHTML = horaire.début+" -- "+horaire.fin;
  //   selectHor.appendChild(option); 
  // });

  label1 = document.createElement('label');
  label2 = document.createElement('label');
  br1 = document.createElement('br');
  br2 = document.createElement('br');

  label1.innerHTML = "Sélectionner un jours ";
  label2.innerHTML = "Sélectionner un horaire";

  console.log("jjjkkkk");

  if(btn.id === "add_hor2"){
    parent = document.getElementById("hor");
    parent.appendChild(label1);
    parent.appendChild(selectJour);
    parent.appendChild(br1);
    parent.appendChild(label2);
    parent.appendChild(début);
    parent.appendChild(fin);
    parent.appendChild(br2);
  } else {
    parent = document.getElementById("hor0");
    parent.appendChild(label1);
    parent.appendChild(selectJour);
    parent.appendChild(br1);
    parent.appendChild(label2);
    parent.appendChild(début);
    parent.appendChild(fin);
    parent.appendChild(br2);

  }




}




function joursData(){

  var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  
  if (this.readyState == 4 && this.status == 200) {
    // var myObj = JSON.parse(this.responseText);
 
    localStorage.setItem("jours",this.responseText);
 
  }
};
xmlhttp.open("GET", "CoursData.php?jours=1", true);
xmlhttp.send();

}


function horaireData(){

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
  
  if (this.readyState == 4 && this.status == 200) {
    // var myObj = JSON.parse(this.responseText);
 
    localStorage.setItem("horaire",this.responseText);
 
  }
};
xmlhttp.open("GET", "CoursData.php?hor=1", true);
xmlhttp.send();

}