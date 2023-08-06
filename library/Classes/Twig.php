<?php

namespace Library\Classes;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Twig extends Environment
{
    public const DEFAULT_PATH = __DIR__."/../../views";
    protected function __construct($dir = null, $options = [])
    {
        $loader = new FilesystemLoader($dir);
        return parent::__construct($loader, $options);
    }

    public static function getInstance($dir, $options=[]): Twig
    {
        $options["debug"] = \ENVIRONMENT=="-1";
        if(!$dir) {
            $dir=self::DEFAULT_PATH;
        }
        $twig = new Twig($dir, $options);
        $twig->addExtension(new \Twig\Extension\DebugExtension());
        return $twig;
    }
}
