<?php

use Contoller\Http\Request;
use View\View;
use Webpatser\Uuid\Uuid;

/**
 * @param array $rootResult
 * @return void
 * fontion charger de gerer les root
 */
function processFundedRoot(array $rootResult)
{
    $handler = $rootResult[1];
    $urlVars = associative_array($rootResult[2]);
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
        $gets_test = ((array_key_exists("gets", $handler)) && ($handler['gets'] === true));
        $vars_test = (array_key_exists("vars", $handler));

        if ($gets_test && $vars_test) {
            $vars = $handler['vars'];
            $classToInstanced = new $class(new Request());
            $classToInstanced->$method(...$vars, ...$urlVars);
        } elseif ($gets_test && !$vars_test) {
            $classToInstanced = new $class(new Request());
            $classToInstanced->$method(...$urlVars);
        } elseif ($vars_test && !array_key_exists("gets", $handler)) {
            $vars = $handler['vars'];
            $classToInstanced = new $class(new Request());
            $classToInstanced->$method(...$vars);
        } else {
            $classToInstanced = new $class(new Request());
            $classToInstanced->$method();
        }
    } else if (is_callable($handler)) {
        $handler(...$urlVars);
    } else {
        Request::abort(404);
        exit();
    }

}

/**
 * @return string
 * Renvoie le nom de domain du site
 */
function rootUrl()
{
    return APP_URL;
}


/**
 * @param $string
 * @return string|string[]
 * this function remove the quotion in a string
 */
function replaceQuotion($string)
{
    $search = ["'", '"'];
    return str_replace($search, "\'", $string) ? str_replace($search, "\'", $string) : $string;
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
 * @param bool $die
 */
function debug(...$vars)
{

    echo '<pre>';
    var_dump($vars);
    echo '</pre>';
    die();
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
    $test_empty_path = !empty($paths);
    if ($test_empty_path && $to_do === SCRIPT) {
        foreach ($paths as $val):
            $path .= sprintf("%s\n", $val);
        endforeach;
    } elseif ($test_empty_path && $to_do === LINK) {
        foreach ($paths as $val):
            $path .= sprintf("%s\n", $val);
        endforeach;
    }
    return $path;
}

/**
 * @param $file
 * @return string
 *  construit le chemin d'accès a un fichier ou a une root en partant du domain principale
 */
function makeRootOrFileUrl($rootOrFile)
{
    return sprintf("%s%s", APP_URL, $rootOrFile);
}

/**
 * @param int $number
 * @param int $threshold
 * @return string
 *  Modifie un nombre en completant des zeros a l'avant pour atteindre la longueur du $threshold (seuil )
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

    $first_three_char_level = substr($filiere, 0, -2);
    $last_second_char_name = substr(md5($name), -3);
    $last_three_char_phone = substr($contact, -3);
    return strtoupper(sprintf("%s%s%s-%s", $first_three_char_level, $last_three_char_phone, $last_second_char_name, custum_number($id)));
}

/**
 * @param array $initial_array
 * @return array
 * convertie un tableau associatif en tableau indexé
 */
function associative_array(array $initial_array)
{
    $indexed_array = [];
    foreach ($initial_array as $value) {
        $indexed_array[] = $value;
    }
    return $indexed_array;
}

/**
 * @param string $adresse
 * @param bool $location
 * @param int $code
 * @param array $vars
 * @param bool $use_templating
 * @return View
 */
function redirect(string $adresse, bool $location = false, int $code = 301, array $vars = [], bool $use_templating = true, bool $die = true)
{
    if ($location) {
        header("Status: 301 Moved Permanently", false, $code);
        header(sprintf("Location: %s", APP_URL . $adresse));
        exit();
    }
    header("Status: 301 Moved Permanently", false, $code);
    return new View($adresse, $vars, $use_templating, $die);
}

/**
 * @return string
 * Recupère la route courante
 */
function current_route()
{
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $url = "https";
    else
        $url = "http";
// Ajout de  // à l'URL.
    $url .= "://";
// Ajoute de  l'hôte (nom de domaine, ip) à l'URL.
    $url .= $_SERVER['HTTP_HOST'];
// Ajout l'emplacement de la ressource demandée à l'URL
    $url .= $_SERVER['REQUEST_URI'];
    return $url;
}

/**
 * @param string $format
 * @param string $subject
 * @param $value
 * @return string|string[]
 * remplace un format bien precis dans une chaine par une valeur;
 */
function sprintf_custuming(string $format, string $subject, $value)
{
    return str_replace($format, $value, $subject);
}

/**
 * @param string $view_name
 * @param array $vars
 * @param bool $use_templating
 * @param bool $die
 * @return View
 */
function view(string $view_name, array $vars = [], bool $use_templating = true, bool $die = true)
{
    return new View($view_name, $vars, $use_templating, $die);
}

/**
 * @param string $index
 * @return false|mixed
 */
function session(string $index, $value = '')
{
    if (empty($value)) {
        return $_SESSION[$index] ?? '';
    }
    $_SESSION[$index] = $value;
    return $_SESSION[$index];
}

/**
 * @param string $string
 * @return string|string[]
 */
function makeStrong(string $string)
{
    return str_replace(array('<*', '*>'), array('<strong>', '</strong>'), $string);
}

/**
 * @param $string
 * @return string
 * Cré une chaine ulisable comme URL
 */
function slug($string)
{
    $slugify = new Cocur\Slugify\Slugify();
    return $slugify->slugify($string);
}

/**
 * @param $fileName
 * @return false|string
 * Cette fonction permet d'obtenir l'extension d'un fichier sans tenir compte du vrai type
 * de ce fichier
 */
function getFileExtension($fileName)
{
    $lastPointPos = strripos($fileName, '.');
    if ($lastPointPos !== 0) {
        return substr($fileName, $lastPointPos);
    }
    return '';
}

/**
 * @return false|mixed|string
 * @throws Exception
 * Génère un identifiant unique
 */
function UuidGenerete()
{
    if (!session('Uuid')) {
        return session('Uuid', Uuid::generate());
    }
    return false;
}

/**
 * @return mixed
 * Permet d'obtenir une version en chaine de caractère de l'identifiant de session de
 * l'utilisateur
 */
function UuidToString()
{
    return session('Uuid')->string;
}

/**
 * @return false|mixed|string
 * Permet d'obtenir une version Objet de l'identfiant de la session de l'utilisateur
 */
function Uuid()
{
    return session('Uuid');
}