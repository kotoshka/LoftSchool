<?php

namespace Kopose\LoftSchool\dz4alternative;

trait TransmissionAuto
{
    use MoveBackward;
    protected function turnOnForward($speed = 0)
    {
        echo 'Я включила передачу вперед <br>';
    }
}
