<?php

/**
* Fonctions de contrôle des chaînes de caractères
*/


/**
 * Vérifie le format d'une adresse mail
 * @param $str
 * @return bool
 */


function isAnEmail($str): bool
{
    return filter_var($str, FILTER_VALIDATE_EMAIL);
}

/**
 * Vérifie le format d'un mot de passe
 * @param $str
 * @return bool
 */

function isAPassword($str): bool
{
    if (empty($str) || strlen($str) < 5) {
        return false;
    } else {
        return is_string($str);
    }
}