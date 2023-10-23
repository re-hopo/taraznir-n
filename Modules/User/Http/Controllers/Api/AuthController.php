<?php

namespace Modules\User\Http\Controllers\Api;


use Carbon\Carbon;
use DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Modules\Misc\Helpers\MiscHelper;
use Modules\Misc\Http\Controllers\EmailController;
use Modules\Misc\Http\Controllers\SMSController;
use Modules\User\Http\Requests\SendRegistrationCodeRequest;

class AuthController extends Controller
{

    /**
     * Create User
     * @param SendRegistrationCodeRequest $request
     * @return JsonResponse
     */
    public function signUpBySMS(SendRegistrationCodeRequest $request): JsonResponse
    {
        try{
            $result = UserController::validator(
                self::signUpValidator( $request->mobile ,mt_rand( 10000 ,99999 ) ,'sign-up-by-mobile')
            );

            if( $result->code !== 200 ){
                return response()->json([
                    'status'  => false,
                    'message' => $result->message
                ] ,$result->code );
            }
            return response()->json([
                'status'  => true,
                'message' => $result->message
            ]);

        }catch (\Throwable $th) {
            return response()->json([
                'status'  => false,
                'message' => $th->getMessage()
            ], 500 );
        }
    }


    /**
     * Create User
     * @param SendRegistrationCodeRequest $request
     * @return JsonResponse
     */
    public function signUpByEmail(SendRegistrationCodeRequest $request): JsonResponse
    {
        try{
            $result = UserController::validator(
                self::signUpValidator( $request->email ,mt_rand( 10000 ,99999 ) ,'sign-up-by-email')
            );

            if( $result->code !== 200 ){
                return response()->json([
                    'status'  => false,
                    'message' => $result->message
                ] ,$result->code );
            }
            return response()->json([
                'status'  => true,
                'message' => $result->message
            ]);

        }catch (\Throwable $th) {
            return response()->json([
                'status'  => false,
                'message' => $th->getMessage()
            ], 500 );
        }
    }


    public static function signUpValidator( string $receptor ,int $code ,$type ): string
    {
        if( $type === 'sign-up-by-sms' && !MiscHelper::mobileValidator( MiscHelper::numberConverter( $receptor ) )){
            return 'mobile_number_incorrect';
        }

        $last = SMSController::last( $receptor ,$type );

        if( $last && $last->updated_at >= Carbon::now()->subMinutes( config('user::config.resend_time' ,2) )->toDateTimeString() ){
            return 'exist_on_queue';
        }

        if( UserController::existChecker( $receptor )){
            return 'exist_user';
        }

        if( MiscHelper::indexChecker( $last ,'sent_count' ,0 ) >= config('user::config.count_on_day' ,20 ) ){
            return 'maximum_send_count';
        }

        if( $type === 'sign-up-by-sms' ){
            $status = SMSController::sendSMSByTemplate( 'registration' ,$receptor ,$code ,'ثبت‌نام' ,'در' );
            if( $status && $last ){
                SMSController::update( $last->id ,[
                    'sent_count' => DB::raw('sent_count + 1'),
                    'code'       => $code
                ]);
                return 'success_sent_sms';
            }
            elseif( $status && !$last ){
                SMSController::create( $receptor ,$code ,'sign-up-by-sms' );
                return 'success_sent_sms';
            }
        }else{
            $status = EmailController::sendEmailByTemplate( 'registration' ,$receptor ,$code );
            if( $status && $last ){
                EmailController::update( $last->id ,[
                    'sent_count' => DB::raw('sent_count + 1'),
                    'code'       => $code
                ]);
                return 'success_sent_sms';
            }
            elseif( $status && !$last ){
                EmailController::create( $receptor ,$code ,'sign-up-by-email' );
                return 'success_sent_sms';
            }
        }

        return 'failed_sent_sms';
    }



    /**
     * Login The User
     * @param SendRegistrationCodeRequest $request
     * @return JsonResponse
     */
    public function signInBySMS(SendRegistrationCodeRequest $request): JsonResponse
    {
        try{
            $result = UserController::validator(
                self::signInValidator(  $request->mobile ,mt_rand( 10000 ,99999 ) )
            );

            if( $result->code !== 200 ){
                return response()->json([
                    'status'  => false,
                    'message' => $result->message
                ] ,$result->code );
            }
            return response()->json([
                'status'  => true,
                'message' => $result->message
            ]);

        }catch (\Throwable $th) {
            return response()->json([
                'status'  => false,
                'message' => $th->getMessage()
            ], 500 );
        }
    }
    public static function signInValidator( string $receptor ,int $code ): string
    {
        if( !MiscHelper::mobileValidator( MiscHelper::numberConverter( $receptor ) )){
            return 'mobile_number_incorrect';
        }

        $last = SMSController::last( $receptor ,'sign-in' );

        if( $last && $last->updated_at >= Carbon::now()->subMinutes( config('user::config.resend_time' ,2) )->toDateTimeString() ){
            return 'exist_on_queue';
        }

        if( !UserController::existChecker( $receptor )){
            return 'not_exist_user';
        }

        if( MiscHelper::indexChecker( $last ,'sent_count' ,0 ) >= config('user::config.count_on_day' ,20 ) ){
            return 'maximum_send_count';
        }

        $status = SMSController::sendSMSByTemplate( 'registration' ,$receptor ,$code ,'ورود' ,'به' );
        if( $status && $last ){
            SMSController::update( $last->id ,[
                'sent_count' => DB::raw('sent_count + 1'),
                'code'       => $code
            ]);
            return 'success_sent_sms';
        }
        elseif( $status && !$last ){
            SMSController::create( $receptor ,$code ,'sign-in' );
            return 'success_sent_sms';
        }
        return 'failed_sent_sms';
    }





}
