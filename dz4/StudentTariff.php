<?php

namespace Kopose\LoftSchool\dz4;

class StudentTariff extends Tariff
{
    protected const PRICE_PER_KM = 4;
    protected const PRICE_PER_TIME = 1;
    protected const MAX_DRIVER_AGE = 25;

    public function __construct($km, $minutes, $driverAge, array $addServices = [])
    {
        parent::__construct($km, $minutes, $minutes, $driverAge, $addServices);
    }
}
