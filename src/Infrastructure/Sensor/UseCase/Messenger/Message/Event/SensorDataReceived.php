<?php

declare(strict_types=1);

namespace Infrastructure\Sensor\UseCase\Messenger\Message\Event;

class SensorDataReceived
{
    private string $sensorIdUuid;
    private float $temperature;
    private int $timestamp;

    public function __construct(string $sensorIdUuid, float $temperature, int $timestamp)
    {
        $this->sensorIdUuid = $sensorIdUuid;
        $this->temperature = $temperature;
        $this->timestamp = $timestamp;
    }

    public function getSensorIdUuid(): string
    {
        return $this->sensorIdUuid;
    }

    public function getTemperature(): float
    {
        return $this->temperature;
    }

    public function getTimestamp(): int
    {
        return $this->timestamp;
    }
}
