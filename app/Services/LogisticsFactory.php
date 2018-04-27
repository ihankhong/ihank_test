<?php

namespace App\Services;

class LogisticsFactory
{
    public static function create(string $companyName)
    {
        switch ($companyName) {
            case 'BlackCat':
                return new BlackCat();
                break;
            case 'Hsinchu':
                return new Hsinchu();
                break;
            case 'PostOffice':
                return new PostOffice();
                break;
            default:
                throw new Exception('No company exception');
                break;
        }
    }
}
