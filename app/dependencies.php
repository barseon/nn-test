<?php

declare(strict_types=1);

use App\Model\DatabaseAdapter;
use App\Model\DatabaseRepository;
use DI\ContainerBuilder;
use Slim\Views\Twig;

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions([
    DatabaseAdapter::class => DI\create()->constructor(DI\get('PDO')),
    'PDO' => function () {
        return DatabaseAdapter::getInstance();
    },
    DatabaseRepository::class => DI\autowire()
        ->constructor(DI\get('PDO')),
    'view' => function () {
        return Twig::create(__DIR__ . '/../templates', ['cache' => false]);
    },
]);

try {
    $container = $containerBuilder->build();
} catch (Exception $e) {
    error_log( $e->getMessage());
}

return $container;