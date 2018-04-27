<?php

namespace App\Services;

class Hsinchu implements LogisticsInterface
{
    public function calculateFee($weight)
    {
        return 80 + $weight * 15;
    }
}
