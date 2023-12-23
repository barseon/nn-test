<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\DatabaseRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class LatestDomainController
{
    public function __construct(
        private readonly DatabaseRepository $repository
    ) {}

    public function getLatestDomain(Request $request, Response $response): Response
    {
        $userId = (int)$request->getAttribute('userId');
        $data = $this->repository->getLatestDomainByUserId($userId);
        $response->getBody()->write(json_encode($data));

        return $response->withHeader('Content-Type', 'application/json');
    }
}