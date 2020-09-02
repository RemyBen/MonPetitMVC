<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc93563dacf6a97ccb868cc893fefaf5c
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Tools\\' => 6,
        ),
        'A' => 
        array (
            'APP\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Tools\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
        'APP\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc93563dacf6a97ccb868cc893fefaf5c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc93563dacf6a97ccb868cc893fefaf5c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}