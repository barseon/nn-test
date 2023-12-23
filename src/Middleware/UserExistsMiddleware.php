<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Model\DatabaseRepository;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Server\MiddlewareInterface;
use Slim\Exception\HttpNotFoundException;
use Slim\Routing\RouteContext;

class UserExistsMiddleware implements MiddlewareInterface
{
    public function __construct(
        private readonly DatabaseRepository $repository
    ) {}

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $routeContext = RouteContext::fromRequest($request);
        $route = $routeContext->getRoute();
        $userId = (int)$route->getArgument('userId');
        $userExists = $this->repository->userExists($userId);

        if (!$userExists) {
            throw new HttpNotFoundException($request, 'User not found.');
        }

        return $handler->handle($request);
    }
}