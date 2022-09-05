<?php

declare(strict_types=1);

namespace Infrastructure\Sensor\UseCase\Messenger\Handler\Event;

use Domain\Temperature\TemperatureRepositoryInterface;
use Infrastructure\Metrics\Repository\OrmTemperatureRepository;
use Infrastructure\Sensor\Repository\OrmSensorRepository;
use Infrastructure\Sensor\UseCase\Messenger\Message\Event\SensorDataReceived;
use Symfony\Component\Messenger\Handler\MessageSubscriberInterface;

class SensorDataReceivedHandler implements MessageSubscriberInterface
{
    private TemperatureRepositoryInterface $temperatureRepository;
    private OrmSensorRepository $sensorRepository;

    public function __construct(
        OrmTemperatureRepository $temperatureRepository,
        OrmSensorRepository $sensorRepository
    ) {
        $this->temperatureRepository = $temperatureRepository;
        $this->sensorRepository = $sensorRepository;
    }

    public static function getHandledMessages(): iterable
    {
        yield SensorDataReceived::class => [
            'method' => '__invoke',
            'priority' => 0,
        ];
    }

    public function __invoke(SensorDataReceived $message): void
    {
        $sensorId =  $this->sensorRepository->findOneBy(['uuid' => $message->getSensorIdUuid()]);
        //dd($sensorId->getId());
        $this->temperatureRepository->save(
            $sensorId->getId(),
            $message->getTemperature(),
            new \DateTimeImmutable(date('Y-m-d H:i:s', $message->getTimestamp()))
        );
    }
}
