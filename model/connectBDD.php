
<?php

function connectBDD(): PDO
{
    $host = '167.99.203.205';
    $db = 'prometech';
    $user = 'root';
    $pass = 'cecBydUv2';
    $charset = 'utf8';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    return new PDO($dsn, $user, $pass);
}