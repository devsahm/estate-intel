<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait BuildBaseRequest
{
    
    public function withBaseUrl()
    {
        return Http::baseUrl($this->baseUrl)->acceptJson();
    }
}