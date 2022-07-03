<?php

namespace App\Taxes;

class Detector
{
    protected $seuilTva;

    public function __construct($seuilTva)
    {
        $this->seuilTva = $seuilTva;
    }
    public function detect(float $prix) : bool
    {
        if ($prix > $this->seuilTva) {
            return true;
        }

        return false;

    }
}
