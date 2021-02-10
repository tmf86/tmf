<?php

// autoload_psr4.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'View\\' => array($baseDir . '/views'),
    'Repository\\' => array($baseDir . '/src/Repository'),
    'Rakit\\Validation\\' => array($vendorDir . '/rakit/validation/src'),
    'PHPMailer\\PHPMailer\\' => array($vendorDir . '/phpmailer/phpmailer/src'),
    'Model\\Shema\\' => array($baseDir . '/models/Schema'),
    'Model\\' => array($baseDir . '/models'),
    'FastRoute\\' => array($vendorDir . '/nikic/fast-route/src'),
    'Contoller\\Http\\' => array($baseDir . '/controllers/Http'),
    'Contoller\\' => array($baseDir . '/controllers'),
);
