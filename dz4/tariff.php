<?php

namespace Kopose\LoftSchool\dz4;

// abstract class
abstract class Tariff implements TariffInterface
{
    use Gps;

    protected const MIN_DRIVER_AGE = 18;
    protected const MAX_DRIVER_AGE = 65;
    protected const PRICE_PER_KM = 0;
    protected const PRICE_PER_TIME = 0;

    private $km;
    private $time;
    private $minutes;
    private $driverAge;
    private $addServices;

    public function __construct($km, $time, $minutes, $driverAge, array $addServices = [])
    {
        $this->km = $km;
        $this->time = $time;
        $this->minutes = $minutes;
        $this->driverAge = $driverAge;
        $this->addServices = $addServices;
    }

    protected function checkDriverAge(int $age): float
    {
        if ($age < $this::MIN_DRIVER_AGE || $age > $this::MAX_DRIVER_AGE) {
            throw new \Exception('Недопустимый возраст водителя!');
        }
        if ($age <= 21) {
            return 1.1;
        }
        return 1;
    }

    protected function minutesToHours(int $minutes): int
    {
        $hours = ceil($minutes / 60);
        return $hours;
    }

    public function countTotalPrice(): int
    {
        $totalPrice = 0;
        if (!empty($this->addServices)) {
            foreach ($this->addServices as $service) {
                switch ($service) {
                    case 'Gps':
                        $hours = $this->minutesToHours($this->minutes);
                        $totalPrice += $this->addServiceGps($hours);
                        break;
                    case 'AdditionalDriver':
                        $addPrice = $this->addServiceAdditionalDriver();
                        if ($addPrice > 0) {
                            $totalPrice += $addPrice;
                        } else {
                            throw new \Exception('Недопустимая услуга AdditionalDriver для тарифа!');
                        }
                        break;
                }
            }
        }
        $koeff = $this->checkDriverAge($this->driverAge);
        $totalPrice += ($this->km * $this::PRICE_PER_KM + $this->time * $this::PRICE_PER_TIME) * $koeff;
        return $totalPrice;
    }

    protected function addServiceAdditionalDriver()
    {

        return 0;
    }
}
