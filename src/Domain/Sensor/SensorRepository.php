<?php

declare(strict_types=1);

namespace Domain\Sensor;

interface SensorRepository
{
    public function getAddressById(int $id): ?string;
}
