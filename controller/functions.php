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
    if (empty($str) ||
        strlen($str) < 8 ||
        !preg_match("#[0-9]+#", $str) ||
        !preg_match("#[a-zA-Z]+#", $str) ||
        !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $str)
    ) {
        return false;
    } else {
        return is_string($str);
    }
}

/**
 * Test si un élément est coché dans un groupe de checkbox
 * @param $chkname
 * @param $value
 * @return bool
 */
function isChecked($chkname, $value)
{
    if (!empty($_POST[$chkname])) {
        foreach ($_POST[$chkname] as $chkval) {
            if ($chkval == $value) {
                return true;
            }
        }
    }
    return false;
}