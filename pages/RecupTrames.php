<?php
/*

function connectBDD(): PDO
{
    $host = 'localhost';
    $db = 'prometech';
    $user = 'root';
    $pass = '';
    $charset = 'utf8';
    
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    return new PDO($dsn, $user, $pass);
}

function Trames($list)
{
    $bdd = new PDO('mysql:host=localhost;dbname=prometech;charset=utf8', 'root', '');
    if ($list[3] == 3) {
        
        $req2 = $bdd->prepare('INSERT INTO capteurs(identifiant, valeur) VALUES(:identifiant,:valeur)');
        $req2->execute(array(
            'identifiant' => $list[4],
            'valeur' => $list[5],
        ));
    }
}


//récupération des trames
function get_data() {
    $ch = curl_init();
    curl_setopt(
        $ch,
        CURLOPT_URL,
        "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=004D");
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $data = curl_exec($ch);
        curl_close($ch);
        
        $data_tab = str_split($data,33);
        return $data_tab ;
}



function uniteCapteur($capteur) : string {
    switch ($capteur){
        case 1 :
            $unite = 'metre' ;
            break;
        case 2 :
            $unite = 'metre' ;
            break;
        case 3 :
            $unite = 'degre C' ;
            break ;
        case 4 :
            $unite = 'pourcentage' ;
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
            $unite = 'degre C';
            
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

function decode_trame($Trames){
    for($i=0, $size=count($Trames) ; $i<$size-1; $i++){
        
        $trame = $Trames[$i];
        // vérification du checksum pour trame valide
        
        $cchk = 0 ; // checksum calculé
        for($j = 0 ; $j < 17; $j++){
            
            $cchk = $cchk + ord($trame[$j]) ;
        }
        $cchk = $cchk%256 ;
        $cchk=dechex($cchk);
        $chk = $trame[17].$trame[18]; //checksum de la trame
        // echo "la trame $i est : $Trames[$i] a pour checksum $chk <br />";
        // echo "<p> le checksum calculé donne $cchk </p>" ;
        
        if($cchk == $chk){
            $trame = $Trames[$i];
            // décodage avec des substring
            $t = substr($trame,0,1);
            $o = substr($trame,1,4);
            // décodage avec sscanf
            list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
            sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
            // echo "<p> le numéro de cette trame est $a </p>";
            // echo '<p>Trame' . $i . ' : ' . "$t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec" . '</p>' ;
            // echo '<p>unite du capteur de la trame  : '. uniteCapteur($c) . '</p>';
            $time = strtotime("$year$month$day$hour$min$sec") ;
            $d = date("Y-m-d H:i:s", $time) ;
            $u = uniteCapteur($c) ;
            if(empty(existenceTrame($o, $v, $d))){
                
                $bdd= connectBDD();
                $req = $bdd->prepare('INSERT INTO donnees(numCemac, identifiant, valeur, date, unite) VALUES(:numCemac , :identifiant , :valeur, :date, :unite)');
                $req->execute(array(
                    'numCemac'=> $o ,
                    'identifiant' => $c.$n, // numéro de série = type capteur + num capteur
                    'valeur' => $v,
                    'date' => $d,
                    'unite' => $u
                ));
                // echo '<p>Trame bien enregistrée dans la BDD ! </p>';
                
            } else{
                //  echo '<p>Cette trame existe déjà dans la BDD ! </p> ' ;
            }
            
        }
        else{
            // echo "<p>Trame invalide ! </p>" ;
        }
        
    }
    
}
function Donnee($donnee) {
    if (strlen ( $donnee ) == 3){
        echo $donnee[0];
        echo $donnee[1];
        echo ".";
        echo $donnee[2];

    }
    else {
        echo $donnee;
    }
}
function luminosite($donnee){
    if($donnee < 100) {
        echo "Il fait sombre.";
    }
    else {
        echo "La pièce est eclairée.";
    }
}


function lectureDonnees($unite, $donnee)

{
    switch ($unite) {
        case 'metre' :
            Donnee($donnee);
            echo ' ';
            echo 'mètres';
            break;
        case 'degre C' :
            Donnee($donnee);
            echo '°';
            break;
        case 'pourcentage' :
            Donnee($donnee);
            echo '%';
            break;
        case 'lumiere' :
            luminosite($donnee);
            break;
        case 'presence':
            echo $donnee;
            break;

        case 'mouvement' :
            echo $donnee;
            break;









    }
}

$data_tab = get_data();

decode_trame($data_tab);

function getValSensor(){
    $bdd=connectBDD();
    $req=$bdd->prepare('SELECT numCemac, identifiant, valeur, date FROM donnees ORDER BY date AND numeroDeSerie DESC ;
');
    $req->execute();
    $valSensor=$req->fetchAll();
    return $valSensor;
    
}

$valSensors = getValSensor();
foreach ($valSensors as $valSensor){
    echo '<p>'.$valSensor['numCemac']. $valSensor['numeroDeSerie'] . $valSensor['valeur']  . '</p>';
}



$ch = curl_init();
curl_setopt(
    $ch,
    CURLOPT_URL,
    "http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=008B&TRAME=$data");
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
   // $data = curl_exec($ch);
    $data = '1008B2a0100001' ;
    curl_close($ch);
    
    
echo 'test' ;

*/