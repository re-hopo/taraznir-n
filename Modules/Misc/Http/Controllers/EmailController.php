<?php

namespace Modules\Misc\Http\Controllers;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\Controller;
use Modules\Misc\Models\SMS;
use Modules\Misc\Service\Kavenegar\Kavenegar;

class EmailController extends Controller
{

    public static function sendEmailByTemplate( $template ,$receptor ): bool
    {
//        return Kavenegar::sendSMSByTemplate( $template ,$receptor );
    }


    public static function last( string $receptor ,string $type ): Model|null
    {
        return Email
            ::where('email' ,$receptor)
            ->where('type'  ,$type)
            ->whereNull('verified')
            ->first();
    }


    public static function create( string $receptor ,int $code ,string $type): void
    {
        Email::create([
            'email'      => $receptor,
            'code'       => $code,
            'type'       => $type,
            'sent_count' => 1
        ]);
    }


    public static function update( int $id ,array $data ): void
    {
        Email::where('id' ,$id )->update( $data );
    }

    public static function updateVerified( int $mobile ,$type ): void
    {
        Email::where('email' ,$mobile )
            ->where('type' ,$type)
            ->whereNull('verified')
            ->update([
                'verified' => Carbon::now()
            ]);
    }

    public static function getSentCode( string $mobile ,$type ): Model|SMS|null
    {
        return Email
            ::where('mobile' ,$mobile)
            ->where('type' ,$type)
            ->whereNull('verified')
            ->first();
    }



}
