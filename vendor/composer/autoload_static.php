<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc07195e889987989863293d804d369a0
{
    public static $prefixesPsr0 = array (
        'Y' => 
        array (
            'Yandex\\Geo' => 
            array (
                0 => __DIR__ . '/..' . '/yandex/geo/source',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInitc07195e889987989863293d804d369a0::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
