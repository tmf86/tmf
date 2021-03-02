<?php

/**  Configuration des accès a la base de donée*/
define("DB_NAME", "cipy");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_HOST", "localhost");

/** Configuration des dossiers et URL*/

define("VIEW_DIRECTORY", "views/");
define("APP_URL", "http://localhost/Cpy-Mvc/");

/** Constantes Globale*/

define('N', 100 * 100);
define('I', 1);
define('SCRIPT', 'script');
define('LINK', 'link');

/** Configuration des accèes a l'api de verification de mail */

define('API_KEY', 'c89c1aaf00cad60c068acb789b2c041b');
define('API_CALL', 'https://apilayer.net/api/check?access_key=%s&email=%s&smtp=%d&format=%d');
define('API_SMTP', 1);
define('API_FORMAT', 1);

/** JWT configuration*/

define('JWT_KEY', '944ae01b90a281daa23c2b23e619ae4c');
define('JWT_ALGORITHM', ['HS256']);
define('JWT_TIME_LIMIT', time() + 3600);
define('JWT_START_VALIDATE', time() + 10);
