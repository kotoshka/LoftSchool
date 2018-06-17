<?php

namespace Kopose\LoftSchool\dz4;

class DailyTariff extends Tariff
{
    use AdditionalDriver;

    protected const PRICE_PER_KM = 1;
    protected const PRICE_PER_TIME = 1000;

    public function __construct($km, $minutes, $driverAge, array $addServices = [])
    {
        $remaining = $minutes % 1440;
        $addDay = ($remaining > 30) ? 1 : 0;
        $days = floor($minutes / 1440) + $addDay;
        parent::__construct($km, $days, $minutes, $driverAge, $addServices);
    }
}
