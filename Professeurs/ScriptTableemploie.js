
function http()
{
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        var myObj = JSON.parse(this.responseText);
                add_to_table(myObj);
        }
         
        };
    
        
        xmlhttp.open("GET", "TableEmploie.php", true);
        xmlhttp.send();
}

function add_to_table(myObj)
{
    var timetable = new Timetable();

    timetable.setScope(8, 21);

    timetable.addLocations(['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche']);
    for(i=0;i<myObj.length;i++)
    {
     var heureDeb = parseInt(myObj[i].début.split(':')[0]);
     var minuteDeb = parseInt(myObj[i].début.split(':')[1]);
     var heureFin = parseInt(myObj[i].fin.split(':')[0]);
     var minuteFin = parseInt(myObj[i].fin.split(':')[1]);

    switch(myObj[i].id_jours)
    {
        
        case '1':
            
                timetable.addEvent(myObj[i].libellé_mat+" "+myObj[i].libellé_niv, 'Lundi', 
                new Date(2015, 7, 17,heureDeb,minuteDeb),new Date(2015, 7, 17, heureFin, minuteFin));
            break;
        case '2':
                timetable.addEvent(myObj[i].libellé_mat+" "+myObj[i].libellé_niv, 'Lundi',
                new Date(2015, 7, 17,heureDeb,minuteDeb),new Date(2015, 7, 17, heureFin, minuteFin));
            break;
        case '3':
                timetable.addEvent(myObj[i].libellé_mat+" "+myObj[i].libellé_niv,'Mercredi',
                new Date(2015, 7, 17,heureDeb,minuteDeb),new Date(2015, 7, 17, heureFin, minuteFin));
            break;
        case '4':
                timetable.addEvent(myObj[i].libellé_mat+" "+myObj[i].libellé_niv,'Jeudi', 
                new Date(2015, 7, 17,heureDeb,minuteDeb),new Date(2015, 7, 17, heureFin, minuteFin));
            break;
        case '5':
                timetable.addEvent(myObj[i].libellé_mat+" "+myObj[i].libellé_niv,'Vendredi',
                 new Date(2015, 7, 17,heureDeb,minuteDeb),new Date(2015, 7, 17, heureFin, minuteFin));
            break;
        case '6':
                timetable.addEvent(myObj[i].libellé_mat+" "+myObj[i].libellé_niv, 'Lundi', 
                new Date(2015, 7, 17,heureDeb,minuteDeb),new Date(2015, 7, 17, heureFin, minuteFin));
            break;
        case '7':
                timetable.addEvent(myObj[i].libellé_mat+" "+myObj[i].libellé_niv, 'Dimanche',
                new Date(2015, 7, 17,heureDeb,minuteDeb),new Date(2015, 7, 17, heureFin, minuteFin));
            break;
        default :
        break;
    }
    }

    var renderer = new Timetable.Renderer(timetable);
    renderer.draw('.timetable');
    // localStorage.removeItem = null;
}
function render_table()
{           
      http();
}


