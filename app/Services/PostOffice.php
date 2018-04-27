<?php

namespace App\Services;

class PostOffice implements LogisticsInterface
{
    public function calculateFee($weight)
    {
        return 70 + $weight * 20;
    }
}
