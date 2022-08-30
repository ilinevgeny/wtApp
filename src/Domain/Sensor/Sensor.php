<?php

declare(strict_types=1);

namespace Domain\Sensor;

class Sensor
{
    private int $id;
    private string $uuid;
    private string $ip;

    public function __construct(int $id, string $uuid, string $ip)
    {
        $this->id = $id;
        $this->uuid = $uuid;
        $this->ip = $ip;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getIp(): string
    {
        return $this->ip;
    }
}