<?php


namespace App;


use Config;

class ApiResponse
{
    public static function success($data=null)
    {
        $responseConstants = Config::get('constants.RESPONSE_CONSTANTS');

        return [
            'success' => true,
            'errors'  => null,
            'data'    => $data
        ];
    }

    public static function validation($message=null, $responseCodeKey='INVALID_PARAMETERS_CODE')
    {
        $responseConstants = Config::get('constants.RESPONSE_CONSTANTS');

        return [
            'success' => false,
            'errors'  => $message,
            'data' => null
        ];
    }

    public static function error($key=null, $responseCodeKey='INVALID_PARAMETERS_CODE',$data=null)
    {
        $responseConstants = Config::get('constants.RESPONSE_CONSTANTS');

        return [
            'success' => false,
            'errors'  => $responseConstants[$key],
            'data' => $data
        ];
    }

}