function http()
{
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        var myObj = JSON.parse(this.responseText);
                add_to_table(myObj);
        }
         
        };
    
        
        xmlhttp.open("GET", "EmploiCoursBD.php", true);
        xmlhttp.send();
}

function add_to_table(myObj)
{
    var timetable = new Timetable();

    timetable.setScope(8, 23);
    var id=0;
    timetable.addLocations(['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche']);
    for(i=0;i<myObj.length;i++)
    {
        
     var heureDeb = parseInt(myObj[i].début.split(':')[0]);
     var minuteDeb = parseInt(myObj[i].début.split(':')[1]);
     var heureFin = parseInt(myObj[i].fin.split(':')[0]);
     var minuteFin = parseInt(myObj[i].fin.split(':')[1]);
     console.log(parseInt(myObj[i].id_jours));
     console.log(heureDeb);
     console.log(minuteDeb);
     console.log(heureFin);
     console.log(minuteFin);
    
    
    switch(parseInt(myObj[i].id_jours))
    {
        
        case 1:
            
                timetable.addEvent("Séance"+(++id),'Lundi', 
                new Date(2019,06,15,heureDeb,minuteDeb),new Date(2019,06,15,heureFin,minuteFin));
            break;
        case 2:
                timetable.addEvent("Séance"+(++id), 'Mardi',
                new Date(2019,06,15,heureDeb,minuteDeb),new Date(2019,06,15, heureFin, minuteFin));
            break;
        case 3:
                timetable.addEvent("Séance"+(++id),'Mercredi',
                new Date(2019,06,15,heureDeb,minuteDeb),new Date(2019,06,15, heureFin, minuteFin));
            break;
        case 4:
                timetable.addEvent("Séance"+(++id),'Jeudi', 
                new Date(2019,06,15,heureDeb,minuteDeb),new Date(2019,06,15, heureFin, minuteFin));
            break;
        case 5:
                timetable.addEvent("Séance"+(++id),'Vendredi',
                 new Date(2019,06,15,heureDeb,minuteDeb),new Date(2019,06,15, heureFin, minuteFin));
            break;
        case 6:
                timetable.addEvent("Séance"+(++id), 'Samedi', 
                new Date(2019,06,15,heureDeb,minuteDeb),new Date(2019,06,15, heureFin, minuteFin));
            break;
        case 7:
                timetable.addEvent("Séance"+(++id), 'Dimanche',
                new Date(2019,06,15,heureDeb,minuteDeb),new Date(2019,06,15, heureFin, minuteFin));
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


