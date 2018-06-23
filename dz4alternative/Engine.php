<?php

namespace Kopose\LoftSchool\dz4alternative;

class Engine
{
    use MoveBackward;

    protected $horsePower;

    public function __construct($horsePower)
    {
        $this->horsePower = $horsePower;
    }

    public function maxSpeed()
    {
        $maxSpeed = $this->horsePower * 2;
        return $maxSpeed;
    }

    public function moveOn($meters)
    {
        $temp = 0;
        for ($i = 0; $i <= $meters; $i += 10) {
            $temp += 5;
            if ($temp >= 90) {
                $this->cooling($temp);
            }
        }
    }

    public function turnOn()
    {
        echo 'Включили двигатель <br>';
    }

    public function turnOff()
    {
        echo 'Выключили двигатель <br>';
    }

    private function cooling($temp)
    {
        echo 'Включили охлаждение <br>';
        $temp -= 10;
        return $temp;
    }
}
