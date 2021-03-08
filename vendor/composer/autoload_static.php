<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6264916c20b8cdaf967ae3749af8fbef
{
    public static $files = array (
        '253c157292f75eb38082b5acb06f3f01' => __DIR__ . '/..' . '/nikic/fast-route/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'View\\' => 5,
            'Validator\\Rules\\' => 16,
            'Validator\\' => 10,
        ),
        'R' => 
        array (
            'Repositories\\' => 13,
            'Rakit\\Validation\\' => 17,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'M' => 
        array (
            'Model\\Shema\\' => 12,
            'Model\\QueriesBulder\\' => 20,
            'Model\\DataBaseManagement\\' => 25,
            'Model\\' => 6,
        ),
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
            'FastRoute\\' => 10,
        ),
        'C' => 
        array (
            'Contoller\\middleware\\' => 21,
            'Contoller\\Http\\' => 15,
            'Contoller\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'View\\' => 
        array (
            0 => __DIR__ . '/../..' . '/views',
        ),
        'Validator\\Rules\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Validators/Rules',
        ),
        'Validator\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Validators',
        ),
        'Repositories\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Repositories',
        ),
        'Rakit\\Validation\\' => 
        array (
            0 => __DIR__ . '/..' . '/rakit/validation/src',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Model\\Shema\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models/Schema',
        ),
        'Model\\QueriesBulder\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models/QueriesBulder',
        ),
        'Model\\DataBaseManagement\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models/Trait',
        ),
        'Model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models',
        ),
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
        'FastRoute\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/fast-route/src',
        ),
        'Contoller\\middleware\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers/middlewares',
        ),
        'Contoller\\Http\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers/Http',
        ),
        'Contoller\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6264916c20b8cdaf967ae3749af8fbef::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6264916c20b8cdaf967ae3749af8fbef::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6264916c20b8cdaf967ae3749af8fbef::$classMap;

        }, null, ClassLoader::class);
    }
}
