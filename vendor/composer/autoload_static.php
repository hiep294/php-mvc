<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb65d148b692d3f15c18bdda4553e0713
{
    public static $prefixLengthsPsr4 = array (
        'm' => 
        array (
            'mvc\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'mvc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb65d148b692d3f15c18bdda4553e0713::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb65d148b692d3f15c18bdda4553e0713::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb65d148b692d3f15c18bdda4553e0713::$classMap;

        }, null, ClassLoader::class);
    }
}
