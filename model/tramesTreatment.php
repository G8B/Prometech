<?php

//ini_set('max_execution_time', 250);

//récupération des trames
function get_data($numCemac) {
    $ch = curl_init();
    curl_setopt(
        $ch,
        CURLOPT_URL,
        "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=$numCemac");
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $data = curl_exec($ch);
        curl_close($ch);
        $count = getTramesCount($numCemac);
        //echo"le compteur vaut " . $count['trameCount'] ;
        $data_tab = str_split($data,33);
        $data_tab2 = array_slice($data_tab, $count);
        return $data_tab2 ;
}



function uniteCapteur($capteur) : string {
    switch ($capteur){
        case 1 :
            $unite = 'mm' ;
            break;
        case 2 :
            $unite = 'mm' ;
            break;
        case 3 :
            $unite = '°C' ;
            break ;
        case 4 :
            $unite = '%' ;
            break;
        case 5 :
            $unite = 'lux' ;
            break ;
        case 6 :
            $unite = 'couleur';
            break ;
        case 7 :
            $unite = 'presence' ;
            break ;
        case 8 :
            $unite = 'lux' ;
            break ;
        case 9 :
            $unite = 'mouvement' ;
            break ;
        default :
            $unite = '°C';
            
    }
    return $unite ;
    
}


function existenceTrame($numCemac, $val, $date){
    $bdd= connectBDD();
    $req = $bdd->prepare('SELECT numCemac, valeur, date FROM donnees WHERE numCemac = ? AND valeur = ? AND date = ? ');
    $req->execute(array($numCemac, $val , $date));
    $existence = $req->fetch();
    $req->closeCursor();
    return $existence;
}

function decode_trame($Trames, $CEMAC){
    //$k=0;
    $k = getTramesCount($CEMAC);
    
    for($i=0, $size=count($Trames) ; $i<$size-1; $i++){
        
        $k++ ;
        
        $bdd = connectBDD();
        $req1 = $bdd->prepare('UPDATE cemac SET trameCount = ? WHERE numero = ?');
        $req1-> execute(array($k , $CEMAC));
        
        $trame = $Trames[$i];
        // vérification du checksum pour trame valide
        
        $cchk = 0 ; // checksum calculé
        for($j = 0 ; $j < 17; $j++){
            
            $cchk = $cchk + ord($trame[$j]) ;
        }
        $cchk = $cchk%256 ;
        $cchk=dechex($cchk);
        $chk = $trame[17].$trame[18]; //checksum de la trame */
        
        if($cchk == $chk){
            
            
            $trame = $Trames[$i];
            // décodage avec des substring
            $t = substr($trame,0,1);
            $o = substr($trame,1,4);
            // décodage avec sscanf
            list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
            sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
            
            $time = strtotime("$year$month$day$hour$min$sec") ;
            $d = date("Y-m-d H:i:s", $time) ;
            $u = uniteCapteur($c) ;
            
            $newCapteursID = getNewCapteursID() ;
            foreach ($newCapteursID as $newCapteurID){
                if(is_null($newCapteurID['ID'])){
                    if($newCapteurID['modele'] == $c AND $newCapteurID['numeroCemac'] == $o){
                        $idc = $c.$n ;
                        setCapteursID($idc, $newCapteurID['numSerie']) ;
                        
                    }
                } else{
                    echo '<p> Ce capteur a déjà un identifiant </p>';
                }
                
            }
            
            $req = $bdd->prepare('INSERT INTO donnees(numCemac, identifiant, valeur, date, unite) VALUES(:numCemac , :identifiant , :valeur, :date, :unite)');
            $req->execute(array(
                'numCemac'=> $o ,
                'identifiant' => $c.$n,
                'valeur' => $v,
                'date' => $d,
                'unite' => $u
            ));
            
            
            //echo '<p>Trame bien enregistrée dans la BDD ! </p>';
            
        }
        
        
        else{
            //echo "<p>Trame invalide ! </p>" ;
        }
        
    }
    
    
}
function Donnee($donnee) {
    if (strlen ( $donnee ) == 3){
        //echo $donnee[0];
        //echo $donnee[1];
        //echo ".";
        //echo $donnee[2];
        $newDonnee = ($donnee[0].$donnee[1].$donnee[2])/10 ;
        return $newDonnee ;
        
    }
    else {
        return $donnee;
    }
}
function luminosite($donnee){
    if($donnee < 100) {
        return "Il fait sombre.";
    }
    else {
        return "La pièce est éclairée.";
    }
}


function lectureDonnees($unite, $donnee)

{
    switch ($unite) {
        case 'mm' :
            $convertValue = Donnee($donnee);
            
            //echo ' ';
            //echo 'mètres';
            break;
        case '°C' :
            $convertValue = Donnee($donnee);
            // echo '°C';
            break;
        case '%' :
            $convertValue = Donnee($donnee);
            //echo '%';
            break;
        case 'lux' :
            $convertValue = luminosite($donnee);
            break;
        case 'presence':
            $convertValue = $donnee;
            break;
            
        case 'mouvement' :
            $convertValue =  $donnee;
            break;
            
    }
    return $convertValue ;
}


function getValSensor($numSerie){
    $bdd=connectBDD();
    $req= $bdd->prepare('SELECT numCemac, valeur, numSerie, unite, date FROM donnees INNER JOIN capteurs WHERE donnees.identifiant = capteurs.ID AND capteurs.numSerie = ? ORDER BY date DESC LIMIT 1');
    $req->execute(array($numSerie));
    $valSensor=$req->fetchAll();
    return $valSensor[0];
    
}

function setTramesCount($numeroCemac, $compteur){
    $bdd= connectBDD();
    $req=$bdd->prepare('UPDATE cemac SET trameCount = ? WHERE numero = ?');
    $req->execute(array($compteur, $numeroCemac));
}

function getTramesCount($cemacNum){
    $bdd=connectBDD();
    $req= $bdd->prepare('SELECT trameCount FROM cemac WHERE numero = ? ');
    $req->execute(array($cemacNum));
    $count = $req->fetchAll();
    return $count[0]['trameCount'];
}

