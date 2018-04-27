<?php

namespace App\Services;

use App\Services\LogisticsFactory;
use Exception;

class ShippingService
{
    public function calculateFee($companyName, $weight)
    {
        $logistics = LogisticsFactory::create($companyName);
        return $logistics->calculateFee($weight);
    }
}
