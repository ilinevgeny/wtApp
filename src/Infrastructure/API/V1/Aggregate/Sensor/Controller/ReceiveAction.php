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
        //dd($this->bus);
        $uuid = 'f8f8f8f8f8f8f8f8f8f8f8f8f8f8f8f8';
        $temperature = 20.0;
        $timestamp = 1234567890;
        $message = new SensorDataReceived($uuid, $temperature, $timestamp);
        $this->bus->dispatch($message);

        return new JsonResponse(['message' => 'data accepted'], Response::HTTP_OK);
    }
}
