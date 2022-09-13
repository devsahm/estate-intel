<?php

namespace App\Http\Controllers;

use App\Contract\ExternalBookContract;
use App\Helpers\ResponseHelper;
use App\Http\Resources\ExternalBookResource;
use Illuminate\Http\Request;

class ExternalBooksController extends Controller
{

    public function __construct(protected ExternalBookContract $externalBook)
    {
    }

    public function externalBooks(Request $request)
    {
        try {
            $books = $this->externalBook->getbooks($request->name);
            $response = ExternalBookResource::collection($books);
            return  ResponseHelper::success($response);
        } catch (\Throwable $th) {
            return ResponseHelper::fail($th->getMessage());
        }

    }

}
