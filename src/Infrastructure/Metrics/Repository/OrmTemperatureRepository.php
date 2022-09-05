<?php

declare(strict_types=1);

namespace Infrastructure\Metrics\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Domain\Temperature\Temperature;
use Domain\Temperature\TemperatureRepositoryInterface;
use Doctrine\Persistence\ManagerRegistry;

class OrmTemperatureRepository extends ServiceEntityRepository implements TemperatureRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Temperature::class);
    }

    public function getAverageBySensorId(int $sensorId): float
    {
        $query = $this->createQueryBuilder('t')
            ->select('AVG(t.temperature)')
            ->where('t.sensor_id = :sensorId')
            ->setParameter('sensorId', $sensorId)
            ->getQuery();

        return (float) $query->getSingleScalarResult();
    }

    public function save(int $sensorId, float $temperature, \DateTimeImmutable $timestamp): void
    {
        $temperature = new Temperature(
            $sensorId,
            $temperature,
            $temperature,
            //$this->convertCelsiusToFahrenheit($temperature),
            $timestamp
        );

        $this->getEntityManager()->persist($temperature);
        $this->getEntityManager()->flush();
    }
}
