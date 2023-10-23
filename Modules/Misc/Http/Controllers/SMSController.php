<?php

namespace Modules\Misc\Http\Controllers;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\Controller;
use Modules\Misc\Models\SMS;
use Modules\Misc\Service\Kavenegar\Kavenegar;

class SMSController extends Controller
{

    public static function sendSMSByTemplate( $template ,$receptor ,$token1 ,$token2 ,$token3 ): bool
    {
        return Kavenegar::sendSMSByTemplate( $receptor ,$token1 ,$token2 ,$token3 ,$template );
    }


    public static function last( string $receptor ,string $type ): Model|null
    {
        return SMS
            ::where('mobile' ,$receptor)
            ->where('type' ,$type)
            ->whereNull('verified')
            ->first();
    }


    public static function create( string $receptor ,int $code ,string $type): void
    {
        SMS::create([
            'mobile'     => $receptor,
            'code'       => $code,
            'type'       => $type,
            'sent_count' => 1
        ]);
    }


    public static function update( int $id ,array $data ): void
    {
        SMS::where('id' ,$id )->update( $data );
    }

    public static function updateVerified( int $mobile ,$type ): void
    {
        SMS::where('mobile' ,$mobile )
            ->where('type' ,$type)
            ->whereNull('verified')
            ->update([
                'verified' => Carbon::now()
            ]);
    }

    public static function getSentCode( string $mobile ,$type ): Model|SMS|null
    {
        return SMS
            ::where('mobile' ,$mobile)
            ->where('type' ,$type)
            ->whereNull('verified')
            ->first();
    }



}
