<?php

namespace App\Http\Controllers;

use App\Services\ShippingService;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    private $shippingService;
    
    public function __construct(ShippingService $shippingService) {
        $this->shippingService = $shippingService;
    }
    
    public function index()
    {
        $companyName = 'PostOffice';
        $weight = 30;
        
        return '運費：' . $this->shippingService->calculateFee($companyName, $weight);
    }
}
