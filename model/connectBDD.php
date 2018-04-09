<?php

function connectBDD(): PDO {
    return new PDO('mysql:host=localhost;dbname=prometech;charset=utf8', 'root', '');
}
