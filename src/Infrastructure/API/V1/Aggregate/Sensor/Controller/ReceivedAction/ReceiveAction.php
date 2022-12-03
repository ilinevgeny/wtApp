<?php

declare(strict_types=1);

namespace Infrastructure\API\V1\Aggregate\Sensor\Controller\ReceivedAction;

use Symfony\Component\HttpFoundation\Request;
use Infrastructure\Sensor\UseCase\Messenger\Message\Event\SensorDataReceived;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ReceiveAction
{
    private MessageBusInterface $bus;

    public function __construct(MessageBusInterface $bus, ValidatorInterface $validator)
    {
        $this->bus = $bus;
        $this->validator = $validator;
    }

    /**
     * @Route("/api/v1/receive/", name="post", methods={"POST"})
    */
    public function post(Request $request): JsonResponse
    {
        $receivedRequest = new ReceivedRequest($request);

        $errors = $this->validator->validate($receivedRequest);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            return new JsonResponse(['message' => $errorsString], Response::HTTP_BAD_REQUEST);
        }

        $uuid = '123e4567-e89b-12d3-a456-426614174000';
        $temperature = rand(1, 200) + rand(0, 10) / 10;
        $timestamp = time();
        $message = new SensorDataReceived($receivedRequest->uuid, $receivedRequest->temperature, $timestamp);
        $this->bus->dispatch($message);

        return new JsonResponse(['message' => 'data accepted'], Response::HTTP_OK);
    }
}
