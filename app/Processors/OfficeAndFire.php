<?php

namespace App\Processors;

use App\Traits\BuildBaseRequest;

class OfficeAndFire
{
    use BuildBaseRequest;

    protected string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('services.office_and_fire.baseurl');
    }
    

    public function books(string $bookName)
    {
        
        $payload  = [
            "name" => $bookName
        ];
        
        $response =  $this->withBaseUrl()->get('books', $payload);
        return json_decode($response);
    }
    
}