<?php

declare(strict_types=1);

namespace Domain\Temperature;

interface TemperatureRepositoryInterface
{
    public function getAverageBySensorId(int $sensorId): float;
}
