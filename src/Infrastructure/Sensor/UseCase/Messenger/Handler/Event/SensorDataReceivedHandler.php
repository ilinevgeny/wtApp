<?php

declare(strict_types=1);

namespace Infrastructure\Sensor\UseCase\Messenger\Handler\Event;

use Infrastructure\Sensor\UseCase\Messenger\Message\Event\SensorDataReceived;
use Symfony\Component\Messenger\Handler\MessageSubscriberInterface;

class SensorDataReceivedHandler implements MessageSubscriberInterface
{
    public static function getHandledMessages(): iterable
    {
        yield SensorDataReceived::class => [
            'method' => '__invoke',
            'priority' => 0,
        ];
    }

    public function __invoke(SensorDataReceived $message): void
    {
        dd($message);
    }
}
