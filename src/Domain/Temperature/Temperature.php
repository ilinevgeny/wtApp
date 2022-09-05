<?php

declare(strict_types=1);

namespace Domain\Temperature;

class Temperature
{
    private int $id;
    private int $sensorId;
    private float $temperatureCelsius;
    private float $temperatureFahrenheit;
    private \DateTimeImmutable $createdAt;

    public function __construct(
        int $sensorId,
        float $temperatureCelsius,
        float $temperatureFahrenheit,
        \DateTimeImmutable $createdAt
    ) {
        $this->sensorId = $sensorId;
        $this->temperatureCelsius = $temperatureCelsius;
        $this->temperatureFahrenheit = $temperatureFahrenheit;
        $this->createdAt = $createdAt;
    }
}
