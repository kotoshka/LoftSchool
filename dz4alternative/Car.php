<?php

namespace Kopose\LoftSchool\dz4alternative;

class Car
{
    use Engine;

    public function move(int $meters, float $speed, bool $forward)
    {
        $this->turnOn();
        if ($speed > $this->maxSpeed()) {
            echo 'Машина не может ехать так быстро, мы поедем со скростью ' . $this->maxSpeed() . '<br>';
        }
        if ($forward) {
            $this->turnOnForward($this->maxSpeed());
        } else {
            $this->turnOnBackward();
        }
        $this->moveOn($meters);
// TODO запретить вызов не из Engine
//        $this->cooling(200);
        $this->turnOff();
    }
}
