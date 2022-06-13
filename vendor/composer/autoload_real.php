<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitc2cd4a6e7dec7333af4f17036d86999f
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitc2cd4a6e7dec7333af4f17036d86999f', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitc2cd4a6e7dec7333af4f17036d86999f', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitc2cd4a6e7dec7333af4f17036d86999f::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
