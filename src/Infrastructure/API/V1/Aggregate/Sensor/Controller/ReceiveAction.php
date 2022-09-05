<?php

declare(strict_types=1);

namespace Infrastructure\API\V1\Aggregate\Sensor\Controller;

use Infrastructure\Sensor\UseCase\Messenger\Message\Event\SensorDataReceived;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class ReceiveAction
{
    private MessageBusInterface $bus;

    public function __construct(MessageBusInterface $bus)
    {
        $this->bus = $bus;
    }
    /**
     * @Route("/api/v1/receive/", name="recieve", methods={"POST"})
    */
    public function receive(): JsonResponse
    {
        $uuid = '123e4567-e89b-12d3-a456-426614174000';
        $temperature = rand(1, 200) + rand(0, 10) / 10;
        $timestamp = time();
        $message = new SensorDataReceived($uuid, $temperature, $timestamp);
        $this->bus->dispatch($message);

        return new JsonResponse(['message' => 'data accepted'], Response::HTTP_OK);
    }
}
