<?php

use Contoller\Http\Request;

/**
 * @param array $rootResult
 * @return void
 * fontion charger de gerer les root
 */
function processFundedRoot(array $rootResult)
{
    $handler = $rootResult[1];
    $urlVars = $rootResult[2];
    if (is_array($handler)) {
        $class = $handler['class'];
        $method = $handler['method'];
        /*
         *  Ici je verifie si le tableau hanler passé contient une clé gets si oui alors je verifie si sa valeur
            est egale a true (booleen) aussi je veriie si la clé vars existe egalement cette clé permet de faire
            passer a la methode qui sera instancié les variables dont elle aura besoin ( donc une sorte d'injection de dependance )
            Il peut arrivé que aussi des variable soit passé par la methode GET et si c'est le cas je signale leur presence
            a l'aide de la clé gets voila pourquoi je verifie si elle aussi existe ainsi  de je peux poser des actions differntes
            En fonctions de ces tests
        */

        if ((key_exists("gets", $handler)) && ($handler['gets'] === true) && (key_exists("vars", $handler))) {
            $vars = $handler['vars'];
            $classToInstanced = new $class();
            $classToInstanced->$method(...$vars, ...$urlVars);
        } elseif ((key_exists("gets", $handler)) && ($handler['gets'] === true) && (!key_exists("vars", $handler))) {
            $classToInstanced = new $class();
            $classToInstanced->$method(...$urlVars);
        } elseif (key_exists("vars", $handler) && !key_exists("gets", $handler)) {
            $vars = $handler['vars'];
            $classToInstanced = new $class();
            $classToInstanced->$method(...$vars);
        } else {
            $classToInstanced = new $class();
            $classToInstanced->$method();
        }
    } else if (is_callable($handler)) {
        call_user_func($handler, ...$urlVars);
    } else {
        Request::abort(404);
    }

}

/**
 * @return string
 * Renvoie le nom de domain du site
 */
function rootUrl()
{
    return getenv('APP_URL');
}


/**
 * @param $string
 * @return string|string[]
 * this function remove the quotion in a string
 */
function replaceQuotion($string)
{
    return str_replace("'", "\'", $string) ? str_replace("'", "\'", $string) : $string;
}

/**
 * deleted space and HTML characters in a string
 * @param string $var
 * @return string
 */
function secureData(string $var)
{
    return htmlspecialchars(strip_tags(trim($var)));
}

/**
 * @param $vars
 * @param bool $do
 * Custum Vardump Print
 */
function debug($vars, $do = false)
{
    if (is_array($vars) && $do) {
        foreach ($vars as $var) {
            echo '<pre>';
            var_dump($var);
            echo '</pre>';
        }
    } else {
        $var = $vars;
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }
}

/**
 * @return string
 * Build bithday
 */
function selectBirthDay($id, $year = false)
{
    $option = '';
    if ($year) {
        $i = $id;
        while ($i <= date("Y")):
            $option .= sprintf("<option value='%d'>%d</option>", $i, $i);
            $i++;
        endwhile;
    } else {
        $i = 1;
        while ($i <= $id):
            $v = (string)$i;
            $v = (strlen($v) < 2) ? sprintf("0%s", $v) : $v;
            $option .= sprintf("<option value='%s'>%s</option>", $v, $v);
            $i++;
        endwhile;
    }
    return sprintf("%s\n", $option);
}

/**
 * @param array $paths
 * @param string $to_do
 * @return string
 * Affiche les balise scripts et links supplementaires
 */
function suppl_tags(array $paths = [], string $to_do = '')
{
    $path = '';
    if (!empty($paths) && $to_do === SCRIPT) {
        foreach ($paths as $val):
            $path .= sprintf("%s\n", $val);
        endforeach;
    } elseif (!empty($paths) && $to_do === LINK) {
        foreach ($paths as $val):
            $path .= sprintf("%s\n", $val);
        endforeach;
    }
    return $path;
}

/**
 * @param $file
 * @return string
 * construit le chemin d'accès a un fichier en partan du domain root
 */
function buildpath($file)
{
    return sprintf("%s%s", getenv('APP_URL'), $file);
}

/**
 * @param int $number
 * @param int $threshold
 * @return string
 * Modifie un nombre en completant des zeros a l'avant pour atteindre la longueur du $threshold
 */
function custum_number(int $number, int $threshold = 1000)
{
    $number = (string)$number;
    $threshold = (string)$threshold;
    $number_lenght = strlen($number);
    $threshold_lenght = strlen($threshold);
//    1000
//    1
    if ($threshold_lenght > $number_lenght) {
        $diff = $threshold_lenght - $number_lenght;
        $zeros = '';
        for ($i = 0; $i < $diff; $i++) {
            $zeros .= '0';
        }
        $number = sprintf("%s%s", $zeros, $number);
    }
    return $number;

}

/**
 * @param int $id
 * @param string $filiere
 * @param string $contact
 * @param string $name
 * @return string
 */
function buildUniqueID(int $id, string $filiere, string $contact, string $name)
{
    $last_three_char_level = substr($filiere, 0, strlen($filiere) - 2);
    $last_second_char_name = substr($name, -3);
    $last_three_char_phone = substr($contact, -3);
    return strtoupper(sprintf("%s%s%s-%s", $last_three_char_level, $last_three_char_phone, $last_second_char_name, custum_number($id)));
}