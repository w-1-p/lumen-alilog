<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0fa7bb1a995422113b709c40c3c3a641
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Wangyipinglove\\LumenAliLog\\' => 27,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Wangyipinglove\\LumenAliLog\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0fa7bb1a995422113b709c40c3c3a641::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0fa7bb1a995422113b709c40c3c3a641::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}