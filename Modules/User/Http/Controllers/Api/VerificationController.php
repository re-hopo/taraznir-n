<?php

namespace Modules\User\Http\Controllers\Api;


use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\Misc\Helpers\MiscHelper;
use Modules\Misc\Http\Controllers\SMSController;
use Modules\User\Http\Requests\VerifyRegistrationCodeRequest;
use Modules\User\Models\User;

class VerificationController extends Controller
{
    public function verifySignUp( VerifyRegistrationCodeRequest $request ): JsonResponse
    {
        try {
            $result = UserController::validator(
                self::signUpValidator( $request->mobile ,(int) $request->code )
            );

            if( $result->code === 200 ){
                $user = User::create([
                    'name'     => $request->name,
                    'email'    => $request->email,
                    'mobile'   => $request->mobile,
                    'password' => Hash::make( $request->password )
                ]);
                SMSController::updateVerified( $request->mobile ,'sign-up' );

                return response()->json([
                    'status'  => true,
                    'message' => $result->message,
                    'token'   => $user->createToken("API TOKEN")->plainTextToken
                ]);
            }
            return response()->json([
                'status'  => false,
                'message' => $result->message,
                'token'   => null
            ] ,$result->code );

        }catch (\Throwable $th) {
            return response()->json([
                'status'  => false,
                'message' => $th->getMessage()
            ], 500 );
        }
    }



    public function verifySignInByCode( VerifyRegistrationCodeRequest $request ): JsonResponse
    {
        try {
            $result = UserController::validator(
                self::signInValidator(  $request->mobile ,(int) $request->code )
            );

            if( $result->code === 200 ){
                $user = User::where('mobile' ,$request->mobile )->first();
                SMSController::updateVerified( $request->mobile ,'sign-in' );

                return response()->json([
                    'status'  => true,
                    'message' => $result->message,
                    'token'   => $user->createToken("API TOKEN")->plainTextToken
                ]);
            }

            return response()->json([
                'status'  => false,
                'message' => $result->message,
                'token'   => null
            ] ,$result->code );

        }catch (\Throwable $th) {
            return response()->json([
                'status'  => false,
                'message' => $th->getMessage()
            ], 500 );
        }
    }


    public static function signUpValidator( string $receptor ,int $code ): string
    {
        if( !MiscHelper::mobileValidator( MiscHelper::numberConverter( $receptor ) )){
            return 'mobile_number_incorrect';
        }

        $last = SMSController::getSentCode( $receptor ,'sign-up' );

        if( !$last ){
            return 'not_found_any_code';
        }

        if( UserController::existChecker( $receptor )){
            return 'exist_user';
        }

        if( $last->try_count >= config('user::config.try_count' ,15 ) ){
            return 'maximum_try_count';
        }

        if( $last->code != $code ){
            SMSController::update( $last->id ,[
                'try_count' => DB::raw('try_count + 1')
            ]);
            return 'incorrect_code';
        }

        return 'success_sign_up';
    }



    public static function signInValidator( string $receptor ,int $code ): string
    {
        if( !MiscHelper::mobileValidator( MiscHelper::numberConverter( $receptor ) )){
            return 'mobile_number_incorrect';
        }

        $last = SMSController::getSentCode( $receptor ,'sign-in' );

        if( !$last ){
            return 'not_found_any_code';
        }

        if( !UserController::existChecker( $receptor )){
            return 'exist_user';
        }

        if( $last->try_count >= config('user::config.try_count' ,15 ) ){
            return 'maximum_try_count';
        }

        if( $last->code != $code ){
            SMSController::update( $last->id ,[
                'try_count' => DB::raw('try_count + 1')
            ]);

            return 'incorrect_code';
        }

        return 'success_sign_in';
    }



    public function verifySignInByPassword( VerifyRegistrationCodeRequest $request ): JsonResponse
    {
        try {
            $user = User::where('mobile' ,$request->mobile)->orWhere('email' ,$request->email)->first();

            if (Hash::check( $request->password ,$user->password )) {
                return response()->json([
                    'status'  => true,
                    'message' => __('user::authentication.validation.sign_in_successful'),
                    'token'   => $user->createToken("API TOKEN")->plainTextToken
                ]);
            }
            return response()->json([
                'status'  => false,
                'message' => __('user::authentication.validation.incorrect_password'),
                'token'   => null
            ] ,403 );

        }catch (\Throwable $th) {
            return response()->json([
                'status'  => false,
                'message' => $th->getMessage()
            ], 500 );
        }

    }





}
