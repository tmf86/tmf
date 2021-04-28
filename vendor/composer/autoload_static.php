<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc388b14c2e65afed52cead60d068d697
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        'a4a119a56e50fbb293281d9a48007e0e' => __DIR__ . '/..' . '/symfony/polyfill-php80/bootstrap.php',
        'a1105708a18b76903365ca1c4aa61b02' => __DIR__ . '/..' . '/symfony/translation/Resources/functions.php',
        '253c157292f75eb38082b5acb06f3f01' => __DIR__ . '/..' . '/nikic/fast-route/src/functions.php',
        'c50606d667a3fde2b80a955639479d3d' => __DIR__ . '/..' . '/wikimedia/timestamp/src/defines.php',
    );

    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Wikimedia\\Timestamp\\' => 20,
            'Webpatser\\Uuid\\' => 15,
        ),
        'V' => 
        array (
            'View\\' => 5,
            'Validator\\Rules\\' => 16,
            'Validator\\' => 10,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Php80\\' => 23,
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Contracts\\Translation\\' => 30,
            'Symfony\\Component\\Translation\\' => 30,
            'Service\\Mailer\\' => 15,
            'Service\\File\\' => 13,
            'Service\\DateTime\\' => 17,
        ),
        'R' => 
        array (
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
        'J' => 
        array (
            'Jenssegers\\Date\\' => 16,
        ),
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
            'FastRoute\\' => 10,
        ),
        'C' => 
        array (
            'Contoller\\Middleware\\TaskBeforeRequest\\' => 39,
            'Contoller\\Middleware\\' => 21,
            'Contoller\\Http\\' => 15,
            'Contoller\\' => 10,
            'Cocur\\Slugify\\' => 14,
            'Carbon\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Wikimedia\\Timestamp\\' => 
        array (
            0 => __DIR__ . '/..' . '/wikimedia/timestamp/src',
        ),
        'Webpatser\\Uuid\\' => 
        array (
            0 => __DIR__ . '/..' . '/webpatser/laravel-uuid/src/Webpatser/Uuid',
        ),
        'View\\' => 
        array (
            0 => __DIR__ . '/../..' . '/views',
        ),
        'Validator\\Rules\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/validators/Rules',
        ),
        'Validator\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/validators',
        ),
        'Symfony\\Polyfill\\Php80\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-php80',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Contracts\\Translation\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/translation-contracts',
        ),
        'Symfony\\Component\\Translation\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/translation',
        ),
        'Service\\Mailer\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Services/mailer',
        ),
        'Service\\File\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Services/File',
        ),
        'Service\\DateTime\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Services/DateTime',
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
        'Jenssegers\\Date\\' => 
        array (
            0 => __DIR__ . '/..' . '/jenssegers/date/src',
        ),
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
        'FastRoute\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/fast-route/src',
        ),
        'Contoller\\Middleware\\TaskBeforeRequest\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers/Middleware/TaskBeforeRequest',
        ),
        'Contoller\\Middleware\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers/Middleware',
        ),
        'Contoller\\Http\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers/Http',
        ),
        'Contoller\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers',
        ),
        'Cocur\\Slugify\\' => 
        array (
            0 => __DIR__ . '/..' . '/cocur/slugify/src',
        ),
        'Carbon\\' => 
        array (
            0 => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon',
        ),
    );

    public static $classMap = array (
        'Attribute' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/Attribute.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Stringable' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/Stringable.php',
        'UnhandledMatchError' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/UnhandledMatchError.php',
        'ValueError' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/ValueError.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc388b14c2e65afed52cead60d068d697::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc388b14c2e65afed52cead60d068d697::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc388b14c2e65afed52cead60d068d697::$classMap;

        }, null, ClassLoader::class);
    }
}
