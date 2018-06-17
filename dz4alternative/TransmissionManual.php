<?php

namespace Kopose\LoftSchool\dz4alternative;

trait TransmissionManual
{
    use MoveBackward;
    protected function turnOnForward($speed = 0)
    {
        if ($speed < 20) {
            echo 'Я включила 1 передачу вперед <br>';
        } else {
            echo 'Я включила 2 передачу вперед <br>';
        }
    }
}
