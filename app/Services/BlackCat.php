<?php

namespace App\Services;

class BlackCat implements LogisticsInterface
{
    public function calculateFee($weight)
    {
        return 100 + $weight * 10;
    }
}
