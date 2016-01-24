<?php

include_once __DIR__."/../../../composer/ClassLoader.php";

$loader = new \Composer\Autoload\ClassLoader();

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

$classMaps = [
    'Dudulu\\' => [$vendorDir."/src/"]
];

foreach ($classMaps as $namespace => $path) {
    $loader->setPsr4($namespace, $path);
}

$loader->register(true);
