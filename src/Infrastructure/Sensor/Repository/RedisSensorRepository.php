<?php

declare(strict_types=1);

namespace Infrastructure\Sensor\Repository;

use Domain\Sensor\SensorRepository;

class RedisSensorRepository implements SensorRepository
{
    private const SENSOR_KEY = 'sensor_id%';

    public function getAddressById(int $id): ?string
    {
        return 'localhost';
    }
}
