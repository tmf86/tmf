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
            'Model\\' => 6,
        ),
        'I' => 
        array (
            'Interfaces\\' => 11,
        ),
        'F' => 
        array (
            'FastRoute\\' => 10,
        ),
        'C' => 
        array (
            'Contoller\\Http\\' => 15,
            'Contoller\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'View\\' => 
        array (
            0 => __DIR__ . '/../..' . '/views',
        ),
        'Validator\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/validators',
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
        'Model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models',
        ),
        'Interfaces\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/interfaces',
        ),
        'FastRoute\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/fast-route/src',
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
