<?php

/**  Configuration des accès a la base de donée*/

putenv("DB_NAME=cipy");
putenv("DB_USER=root");
putenv("DB_PASSWORD=");
putenv("DB_HOST=localhost");

/** Configuration des dossiers et URL*/

putenv("VIEW_DIRECTORY=views/");
putenv("APP_URL=http://localhost/Cpy-Mvc/");

/** Constantes Globale*/

define('N', 100 * 100);
define('I', 1);
define('SCRIPT', 'script');
define('LINK', 'link');