<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite0e00e378005d4c7824baca55e5075a7
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
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite0e00e378005d4c7824baca55e5075a7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite0e00e378005d4c7824baca55e5075a7::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
