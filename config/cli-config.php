<?php
use Slim\App;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

$settings = require __DIR__ . '/config.php';
$app = new App($settings);
require __DIR__ . '/dependencies.php';

$container = $app->getContainer();

$entityManager = $container->get('db');

return ConsoleRunner::createHelperSet($entityManager);
