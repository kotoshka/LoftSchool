<?php

namespace Kopose\LoftSchool\dz4alternative;

class Car
{
    private $engine;
    public function __construct($engine)
    {
        $this->engine = $engine;
    }

    public function move(int $meters, float $speed, bool $forward)
    {
        $this->engine->turnOn();
        if ($speed > $this->engine->maxSpeed()) {
            echo 'Машина не может ехать так быстро, мы поедем со скростью ' . $this->engine->maxSpeed() . '<br>';
        }
        if ($forward) {
            $this->turnOnForward($this->engine->maxSpeed());
        } else {
            $this->engine->turnOnBackward();
        }
        $this->engine->moveOn($meters);
        // не вызовется
//        $this->cooling(200);
        $this->engine->turnOff();
    }
}
