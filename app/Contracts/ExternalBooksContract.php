<?php

namespace App\Contract;

interface ExternalBookContract
{
    public function getbooks(string $bookName);
}