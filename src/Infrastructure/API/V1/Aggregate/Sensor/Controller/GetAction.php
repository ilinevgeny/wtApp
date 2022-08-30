<?php

declare(strict_types=1);

namespace Infrastructure\API\V1\Aggregate\Sensor\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetAction
{
//    private SensorMapRepository $sensorMap;
//    public function __construct(SensorMapRepository $map)
//    {
//        $this->sensorMap = $map;
//    }

    /**
     * @Route("/api/v1/sensor/{id}", name="get", methods={"GET"})
     */
    public function get(int $id): JsonResponse
    {
        $this->handler();
        return new JsonResponse(['message' => $id], Response::HTTP_OK);
    }

}