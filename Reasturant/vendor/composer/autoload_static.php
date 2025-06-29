<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit652b5144671c7c0c6be98a76c151060b
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit652b5144671c7c0c6be98a76c151060b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit652b5144671c7c0c6be98a76c151060b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit652b5144671c7c0c6be98a76c151060b::$classMap;

        }, null, ClassLoader::class);
    }
}
