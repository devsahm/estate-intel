<?php

namespace App\Contracts;

interface ExternalBookContract
{
    public function getbooks(string $bookName);
}