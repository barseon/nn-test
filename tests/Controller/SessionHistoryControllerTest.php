<?php

declare(strict_types=1);

namespace Tests\Controller;

use App\Controller\SessionHistoryController;
use App\Model\DatabaseRepository;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class SessionHistoryControllerTest extends TestCase
{
    public function testGetSessionsHistory()
    {
        $userId = 123;
        $sampleData = [
            ['session_id' => '1', 'score' => 100, 'date' => '2023-01-01'],
            ['session_id' => '2', 'score' => 95, 'date' => '2023-01-02']
        ];

        $requestMock = $this->createMock(ServerRequestInterface::class);
        $responseMock = $this->createMock(ResponseInterface::class);
        $streamMock = $this->createMock(StreamInterface::class);
        $repositoryMock = $this->createMock(DatabaseRepository::class);

        $requestMock->expects($this->once())
            ->method('getAttribute')
            ->with($this->equalTo('userId'))
            ->willReturn($userId);

        $repositoryMock->expects($this->once())
            ->method('getSessionHistoryByUserId')
            ->with($this->equalTo($userId))
            ->willReturn($sampleData);

        $responseMock->method('getBody')->willReturn($streamMock);
        $responseMock->expects($this->once())
            ->method('withHeader')
            ->with($this->equalTo('Content-Type'), $this->equalTo('application/json'))
            ->willReturnSelf();

        $streamMock->expects($this->once())
            ->method('write')
            ->with($this->equalTo(json_encode($sampleData)));

        $controller = new SessionHistoryController($repositoryMock);

        $response = $controller->getSessionsHistory($requestMock, $responseMock, ['userId' => $userId]);

        $this->assertInstanceOf(ResponseInterface::class, $response);
    }
}
