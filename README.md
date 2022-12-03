# T-Monitor

### Test application for companies which can be interested in my skills

## Description

Application to read and manage data from temperature sensors. Application is purely internal, so no authorisation needed.

### Features
1. Middle temperature from all sensors, in submitted days range
2. Middle temperature for a particular sensor readings, in one-hour range

#### Sensors specifications
##### Type 1: 
Can report to API, reports with POST method, json with following structure:
``` 
{
    "reading": {
        "sensor_uuid": "unique uuid of sensor",
        "temperature": "decimal format, xxx.xxx, in fahrenheit"
    }
}
```
##### Type 2: 
Expects data to be read from it’s API, new sensors will be added manually via some basic form
Sensor expects request `GET %sensor_ip%/data`
Return is a csv - string:
`reading_id`, `temperature` in celsius in format xxx.x decimal

`reading_id` is a sequence number, which increases each time when sensor reads temperature.

### Specification of app
1. Application is written in PHP 7.4
2. Application uses Symfony 5.2 framework
3. Application uses Doctrine ORM
4. Application uses DDD approach


## Installation
```docker-compose up -d```

```composer install```

```symfony console doctrine:database:create```

```symfony console doctrine:migrations:migrate```

```symfony serve```
