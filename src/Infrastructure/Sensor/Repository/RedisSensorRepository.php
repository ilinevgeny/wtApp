<?php

declare(strict_types=1);

use Redis;

class RedisSensorRepository implements \Domain\Sensor\Repository\SensorRepository
{
    private const SENSOR_KEY = 'sensor_id%';

    public function getAddressById(int $id): ?string
    {
        return 'localhost';
    }
}