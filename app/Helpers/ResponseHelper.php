<?php


namespace App\Helpers;

class ResponseHelper
{
   
    public static function build($response, $statusCode)
    {
        return response()->json($response, $statusCode);
    }

    
    public static function success($response, $statusCode = 200)
    {
        $buildableResponse = [ 'status_code' => $statusCode, 'status' => 'success', 'data' => $response];
        return static::build($buildableResponse, $statusCode);
    }

   
    public static function fail($response, $statusCode = 404 )
    {
        $buildableResponse = ['status_code' => $statusCode, 'status'  => 'Not Found', 'data' => [] ];
        return static::build($buildableResponse , $statusCode);
    }

    public static function successWithMessage($response =[], $statusCode = 200, $message)
    {
        $buildableResponse = ['status_code' => $statusCode, 'status'  => 'success', 'message' => $message, 'data' => $response ];
        return static::build($buildableResponse , $statusCode);
    }
}
