<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbaf0b1b659e688a64051c5ee9742a77e
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'M' => 
        array (
            'ModbusTcpClient\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'ModbusTcpClient\\' => 
        array (
            0 => __DIR__ . '/..' . '/aldas/modbus-tcp-client/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbaf0b1b659e688a64051c5ee9742a77e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbaf0b1b659e688a64051c5ee9742a77e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbaf0b1b659e688a64051c5ee9742a77e::$classMap;

        }, null, ClassLoader::class);
    }
}