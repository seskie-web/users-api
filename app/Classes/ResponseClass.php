<?php

namespace App\Classes;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Exceptions\HttpResponseException;

class ResponseClass
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    
    /**
     * Rollback transaction in case of an error and throw exception
     * @param mixed $ex
     * @param mixed $msg
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public static function rollback($ex, $msg = "Error occured: => process could not be completed"){
        DB::rollBack();
        self::throwError($ex, $msg);
    }
    
    /**
     * ThrowError
     * @param mixed $ex
     * @param mixed $msg
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     * @return never
     */
    public static function throwError($ex, $msg = "Error occured: => process could not be completed"){
        Log::info($ex);
        throw new HttpResponseException(response()->json(["message" => $msg , 'error' => $ex], 500));
    }
    
    /**
     * Send response back
     * @param mixed $result
     * @param mixed $message
     * @param mixed $code
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public static function sendResponse($result , $message , $code = 200){
        $response = [
            'success' => true,
            'data'    => $result
        ];

        if(!empty($message)){
            $response['message'] = $message;
        }
        
        return response()->json($response, $code);
    }
}
