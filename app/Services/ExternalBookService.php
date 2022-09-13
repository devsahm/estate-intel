<?php 

namespace App\Services;

use App\Contract\ExternalBookContract;
use App\Processors\OfficeAndFire;
use Exception;

class ExternalBookService implements ExternalBookContract
{

    public function __construct(protected OfficeAndFire $officeAndFire)
    {   
    }

    public function getbooks(string $bookName)
    {
         $response = $this->officeAndFire->books($bookName);

         if (count($response) > 0 ) {
            return $response;
         }
         
         throw new Exception('not found');
    }

}