<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit4ee1dd3ef057a94ccc2f3eda9084b1aa
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

        spl_autoload_register(array('ComposerAutoloaderInit4ee1dd3ef057a94ccc2f3eda9084b1aa', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit4ee1dd3ef057a94ccc2f3eda9084b1aa', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit4ee1dd3ef057a94ccc2f3eda9084b1aa::getInitializer($loader));

        $loader->register(true);

        $includeFiles = \Composer\Autoload\ComposerStaticInit4ee1dd3ef057a94ccc2f3eda9084b1aa::$files;
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequire4ee1dd3ef057a94ccc2f3eda9084b1aa($fileIdentifier, $file);
        }

        return $loader;
    }
}

/**
 * @param string $fileIdentifier
 * @param string $file
 * @return void
 */
function composerRequire4ee1dd3ef057a94ccc2f3eda9084b1aa($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

        require $file;
    }
}
