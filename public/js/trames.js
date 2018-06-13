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

function loadDoc(url, data, cFunction) {
    var xhttp;
    xhttp = newXMLHttp();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
         //   cFunction(this);
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


    var databaseTimer = setInterval(updateDatabase, 1000);

    databaseTimer ; 