<?php
session_start();
require('tramesTreatment.php');
require('houses.php');
require('connectBDD.php');

$cemacs = getCemacs();
foreach ($cemacs as $cemac) {
    $data_tab = get_data($cemac['numero']);
    decode_trame($data_tab, $cemac['numero']);
}