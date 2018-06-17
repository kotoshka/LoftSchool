<?php

namespace Kopose\LoftSchool\dz4;

class BasicTariff extends Tariff
{
    public const PRICE_PER_KM = 10;
    public const PRICE_PER_TIME = 3;

    public function __construct($km, $minutes, $driverAge, array $addServices = [])
    {
        parent::__construct($km, $minutes, $minutes, $driverAge, $addServices);
    }

}
