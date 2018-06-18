<?php

namespace Kopose\LoftSchool\dz4alternative;

trait Engine
{
    protected $horsePower = 5;

    protected function maxSpeed()
    {
        $maxSpeed = $this->horsePower * 2;
        return $maxSpeed;
    }

    protected function moveOn($meters)
    {
        $temp = 0;
        for ($i = 0; $i <= $meters; $i += 10) {
            $temp += 5;
            if ($temp >= 90) {
                $this->cooling($temp);
            }
        }
    }

    protected function turnOn()
    {
        echo 'Включили двигатель <br>';
    }

    protected function turnOff()
    {
        echo 'Выключили двигатель <br>';
    }

    public function cooling($temp)
    {
        echo 'Включили охлаждение <br>';
        $temp -= 10;
        return $temp;
    }
}
