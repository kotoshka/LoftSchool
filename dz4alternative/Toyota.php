<?php

namespace Kopose\LoftSchool\dz4alternative;

class Toyota extends Car
{
//    use TransmissionAuto;
    use TransmissionManual;
    public function __construct(Engine $engine)
    {
        parent::__construct($engine);
    }
}
