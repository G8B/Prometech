<?php


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
        
        $req2 = $bdd->prepare('INSERT INTO capteurs(numeroDeSerie, valeur) VALUES(:numeroDeSerie,:valeur)');
        $req2->execute(array(
            'numeroDeSerie' => $list[4],
            'valeur' => $list[5],
        ));
    }
}

function Temps($temps){
    
    $bdd= connectBDD();
    $req = $bdd->prepare('INSERT INTO capteurs(date) VALUES (:date)');
    
    $req->execute([
        
        'date' => $temps
    ]);
    echo '<p>Date bien insérée ! </p>' ;
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
        
        
        $data = ltrim($data);
        $data = rtrim($data);
        //echo $data."<br/>";
        if(strlen($data)>500000){
            echo "More than 500000 <br/>";
            $data=substr($data,strlen($data)-500000,strlen($data));
            
        } else{
            echo '<p>ok !</p>';
        }
        
        $data_tab = str_split($data,33);
        return $data_tab ;
}

$data_tab = get_data();


echo "Tabular Data:<br />";
for($i=0, $size=count($data_tab); $i<$size-1; $i++){
    echo "Trame $i: $data_tab[$i]<br />";
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
            $unite = 'lumiere' ;
            break ;
        case 6 :
            $unite = 'couleur';
            break ;
        case 7 :
            $unite = 'presence' ;
            break ;
        case 8 :
            $unite = 'lumiere' ;
            break ;
        case 9 :
            $unite = 'mouvement' ;
            break ;
        default :
            $unite = 'temperature';
            
    }
    return $unite ;
    
}

function decode_trame($Trames){
    for($i=0, $size=count($Trames) ; $i<$size-1; $i++){
        $trame = $Trames[$i];
        // décodage avec des substring
        $t = substr($trame,0,1);
        $o = substr($trame,1,4);
        // décodage avec sscanf
        list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
        sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
        echo '<p>Trame' . $i . ' : ' . "$t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec" . '</p>' ;
        echo '<p>unite du capteur de la trame  : '. uniteCapteur($c) . '</p>';
        $time = strtotime("$year$month$day$hour$min$sec") ;
        $d = date("Y-m-d H:i:s", $time) ;
        $u = uniteCapteur($c) ;
        $bdd= connectBDD();
        $req = $bdd->prepare('INSERT INTO donnees(numCemac, numeroDeSerie, valeur, date, unite) VALUES(:numCemac , :numeroDeSerie , :valeur, :date, :unite)');
        $req->execute(array(
            'numCemac'=> $o ,
            'numeroDeSerie' => $n,
            'valeur' => $v,
            'date' => $d,
            'unite' => $u
        ));
        echo '<p>Trame bien enregistrée dans la BDD ! </p>';
        
    }
    
    
    
}


decode_trame($data_tab);