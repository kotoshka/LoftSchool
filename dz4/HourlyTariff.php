<?php

namespace Kopose\LoftSchool\dz4;

class HourlyTariff extends Tariff
{
    use AdditionalDriver;

    public const PRICE_PER_KM = 0;
    public const PRICE_PER_TIME = 200;

    public function __construct($km, $minutes, $driverAge, array $addServices = [])
    {
        $hours = $this->minutesToHours($minutes);
        parent::__construct($km, $hours, $minutes, $driverAge, $addServices);
    }
}
