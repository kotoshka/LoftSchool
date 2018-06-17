<?php

namespace Kopose\LoftSchool\dz4;

// если в названии используется абривиатура, то можно ли написать все заглавными trait GPS?
trait Gps
{
    protected function addServiceGps(int $hour)
    {
        $hour = ceil($hour);
        $gpsPrice = $hour * 15;
        return $gpsPrice;
    }
}
