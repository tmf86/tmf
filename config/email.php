<?php
/**
 * Configuration du service d'envoie de mail
 */
define('MAIL_HOST', 'smtp.gmail.com');
define('MAIL_USERNAME', 'cpypigier@gmail.com');
define('MAIL_PASSWORD', 'cpy@2020');
define('MAIL_SENDER', 'CIPY');
define('MAIL_PORT', 587);

/**
 * Configuration des donées de l'api de verification de mail
 */

define('API_KEY', 'c89c1aaf00cad60c068acb789b2c041b');
define('API_CALL', 'https://apilayer.net/api/check?access_key=%s&email=%s&smtp=1&format=1');
