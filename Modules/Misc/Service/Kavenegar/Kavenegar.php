<?php

namespace Modules\Misc\Service\Kavenegar;



use Illuminate\Support\Facades\Log;

class Kavenegar
{
    const API_KEY = '35774F6E366B3761614E797143624E574F5A77697646503951756E735834326D54414E36514432627467773D';
    const BY_MESSAGE_PATH = 'https://api.kavenegar.com/v1/'.self::API_KEY.'/sms/send.json';
    const BY_TEMPLATE_PATH = 'https://api.kavenegar.com/v1/'.self::API_KEY.'/verify/lookup.json';

    public static function sendSMSByTemplate( $mobile ,$token1 ,$token2 ,$token3 ,$template ): bool
    {
        if ( is_numeric( $mobile ) ){
            $params = [
                "receptor" => $mobile ,
                "token"    => $token1 ,
                "token2"   => $token2 ,
                "token3"   => $token3 ,
                "template" => $template
            ];
            return self::send( $params ,self::BY_TEMPLATE_PATH );
        }
        return false;
    }

    public static function sendSMSAsText( $mobile ,$message ): bool
    {
        if ( is_numeric( $mobile ) && !empty( $message )  ){
            $params = [
                "receptor" => $mobile ,
                "sender"   => 2000500666 ,
                "message"  => $message
            ];
            return self::send( $params ,self::BY_MESSAGE_PATH );
        }
        return false;
    }


    public static function send( array $params ,string $path ): bool
    {
        $headers  = [
            'Accept: application/json',
            'Content-Type: application/x-www-form-urlencoded',
            'charset: utf-8'
        ];

        $handle = curl_init();
        curl_setopt( $handle ,CURLOPT_URL ,$path );
        curl_setopt( $handle ,CURLOPT_HTTPHEADER ,$headers);
        curl_setopt( $handle ,CURLOPT_RETURNTRANSFER ,true);
        curl_setopt( $handle ,CURLOPT_SSL_VERIFYHOST ,false);
        curl_setopt( $handle ,CURLOPT_SSL_VERIFYPEER ,false);
        curl_setopt( $handle ,CURLOPT_POST ,true);
        curl_setopt( $handle ,CURLOPT_POSTFIELDS ,http_build_query( $params ) );

        $response     = curl_exec( $handle );
        $code         = curl_getinfo( $handle ,CURLINFO_HTTP_CODE);
        $curl_errno   = curl_errno( $handle );
        $curl_error   = curl_error( $handle );

        $json_response = json_decode( $response );
        $json_return = $json_response->return;
        if ( $code != 200 || $json_return->status != 200 ) {
            Log::channel('kavenegar')->error( self::logTextMaker( $curl_error ,$code ,$json_return ) );
            return false;
        }
        return true;
    }


    public static function logTextMaker( $curlError ,$statusCode ,$jsonResponse ): string
    {
        $error_message = $jsonResponse->message ?? 'not found err msg';
        return " Curl_Error:$curlError ,Error_Code:$statusCode ,Error_Message:$error_message ";
    }

}
