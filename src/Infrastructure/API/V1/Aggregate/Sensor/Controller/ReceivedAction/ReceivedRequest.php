<?php

declare(strict_types=1);

namespace Infrastructure\API\V1\Aggregate\Sensor\Controller\ReceivedAction;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

class ReceivedRequest
{
    public function __construct(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $this->uuid = $data['reading']['sensor_uuid'];
        $this->temperature = (float)$data['reading']['temperature'];
    }

    /**
     * @Assert\Uuid()
     */
    public string $uuid;

    /**
     * @Assert\Range(max=999.999)
     */
    public float $temperature;
}

