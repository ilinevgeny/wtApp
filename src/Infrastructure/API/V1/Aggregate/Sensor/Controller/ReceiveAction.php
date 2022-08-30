<?php

declare(strict_types=1);

namespace Infrastructure\API\V1\Aggregate\Sensor\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReceiveAction
{
    /**
     * @Route("/api/v1/receive/", name="recieve", methods={"POST"})
    */
    public function receive(): JsonResponse
    {

        return new JsonResponse(['message' => 'data accepted'], Response::HTTP_OK);
    }

}