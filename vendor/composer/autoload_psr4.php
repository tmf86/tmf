<?php

// autoload_psr4.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'View\\' => array($baseDir . '/views'),
    'Validator\\Rules\\' => array($baseDir . '/src/validators/Rules'),
    'Validator\\' => array($baseDir . '/src/validators'),
    'Service\\Mailer\\' => array($baseDir . '/src/Services/mailer'),
    'Service\\File\\' => array($baseDir . '/src/Services/File'),
    'Rakit\\Validation\\' => array($vendorDir . '/rakit/validation/src'),
    'PHPMailer\\PHPMailer\\' => array($vendorDir . '/phpmailer/phpmailer/src'),
    'Model\\Shema\\' => array($baseDir . '/models/Schema'),
    'Model\\QueriesBulder\\' => array($baseDir . '/models/QueriesBulder'),
    'Model\\DataBaseManagement\\' => array($baseDir . '/models/Trait'),
    'Model\\' => array($baseDir . '/models'),
    'Firebase\\JWT\\' => array($vendorDir . '/firebase/php-jwt/src'),
    'FastRoute\\' => array($vendorDir . '/nikic/fast-route/src'),
    'Contoller\\Middleware\\TaskBeforeRequest\\' => array($baseDir . '/controllers/Middleware/TaskBeforeRequest'),
    'Contoller\\Middleware\\' => array($baseDir . '/controllers/Middleware'),
    'Contoller\\Http\\' => array($baseDir . '/controllers/Http'),
    'Contoller\\' => array($baseDir . '/controllers'),
    'Cocur\\Slugify\\' => array($vendorDir . '/cocur/slugify/src'),
);
