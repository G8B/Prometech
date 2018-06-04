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
        $data_tab = str_split($data,33);
        return $data_tab ;
}

$data_tab = get_data();


echo "Tabular Data:<br />";
for($i=0, $size=count($data_tab); $i<$size-1; $i++){
    echo "Trame $i: $data_tab[$i]<br />";
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
        $time = strtotime("$year$month$day$hour$min$sec") ;
        $d = date("Y-m-d H:i:s", $time) ;
        $bdd= connectBDD();
        $req = $bdd->prepare('INSERT INTO donnees(numCemac, numeroDeSerie, valeur, date) VALUES(:numCemac , :numeroDeSerie , :valeur, :date)');
        $req->execute(array(
            'numCemac'=> $o ,
            'numeroDeSerie' => $n,
            'valeur' => $v,
            'date' => $d
        ));
        echo '<p>Trame bien enregistrée dans la BDD ! </p>';
        
    }
    
    
    
}


decode_trame($data_tab);





// $trame = $data_tab[1];
// décodage avec des substring
//$t = substr($trame,0,1);
//$o = substr($trame,1,4);
// …
// décodage avec sscanf
//list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
//sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
/* echo("<br />$t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec<br />");



$time = strtotime("$year$month$day$hour$min$sec") ;
$d = date("Y-m-d H:i:s", $time) ;
echo($d);


Temps($d);
echo 'date insérée dans la BDD' ;


*/



