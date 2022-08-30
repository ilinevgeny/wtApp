<?php

declare(strict_types=1);

namespace Domain\SensorMap;

class SensorMap
{
    private array $sensors;

    public function __construct(array $sensors)
    {
        $this->sensors = $sensors;
    }

    public function getSensors(): array
    {
        return $this->sensors;
    }
}