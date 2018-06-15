function newXMLHttp() {
    if (window.XMLHttpRequest) {
        xmlhttp=new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        try {
            xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                return NULL;
            }
        }
    }
    return xmlhttp;
}

function callback(xhttp){
	var renvoi = xhttp.responseText ; 
	for(var i = 0 ; i <elements.length ; i++){
		elements[i].innerHTML = 'Dernière valeur enregistrée : ' + renvoi ;
	}
	
}

function loadDoc(url, data, cFunction) {
    var xhttp;
    xhttp = newXMLHttp();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200 && cFunction) {
            cFunction(this);
            console.log(this.responseText);
        }
    };
    xhttp.open("POST", url, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(data);
    
}


function updateDatabase() {
    loadDoc("/model/updateDatabase.php","t="+Math.random());
}

function updateAffichage(){
	loadDoc("/model/updateAffichages.php","t="+Math.random(), callback);
}

var elements = document.getElementsByClassName("lastValueSensor");


function updateShownValue(){
	for(var i = 0 ; i <elements.length ; i++){
		elements[i].innerHTML = 'Dernière valeur enregistrée : ' + f ;
	}
}


    var databaseTimer = setInterval(updateDatabase, 1000);
   var dashboardTimer = setInterval(updateAffichage, 1000);

    databaseTimer ;
    
    dashboardTimer;
    