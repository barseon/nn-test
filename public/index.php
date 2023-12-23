<?php

declare(strict_types=1);

use App\Controller\LatestDomainController;
use App\Controller\SessionHistoryController;
use App\Middleware\UserExistsMiddleware;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Exception\HttpNotFoundException;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

require __DIR__ . '/../vendor/autoload.php';
$container = require __DIR__ . '/../app/dependencies.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

AppFactory::setContainer($container);
$app = AppFactory::create();

$responseFactory = $app->getResponseFactory();

$app->get('/', function ($request, $response, $args) {
    return $this->get('view')->render($response, 'main.twig');
});

$app->group('/api/{userId}', function ($group) {
    $group->get('/sessions-history', SessionHistoryController::class . ':getSessionsHistory');
    $group->get('/latest-domain', LatestDomainController::class . ':getLatestDomain');
})->add(UserExistsMiddleware::class);

$errorMiddleware = $app->addErrorMiddleware(true, true, true);
$errorMiddleware->setErrorHandler(HttpNotFoundException::class, function (ServerRequestInterface  $request, Throwable $exception) use ($responseFactory) {
    $response = $responseFactory->createResponse(404);
    $response->getBody()->write(json_encode(['error' => 'User not found']));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->run();