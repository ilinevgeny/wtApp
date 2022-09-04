<?php

declare(strict_types=1);

namespace Infrastructure\Sensor\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Domain\Sensor\SensorRepository;
use Domain\Sensor\Sensor;

class OrmSensorRepository extends ServiceEntityRepository implements SensorRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sensor::class);
    }

    public function getAddressById(int $id): ?string
    {
        $sensor = $this->find($id);

        if (!$sensor instanceof Sensor) {
            return null;
        }
        return $sensor->getIp();
    }

    public function getAll(): array
    {
        return $this->findAll();
    }
}
