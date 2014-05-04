<?php

$finder = Symfony\CS\Finder\DefaultFinder::create();
$finder->exclude('vendor');
$finder->exclude('tests');
$finder->in(__DIR__);

$config = Symfony\CS\Config\Config::create();
$config->fixers(array('indentation', 'elseif'))

return $config->finder($finder);
