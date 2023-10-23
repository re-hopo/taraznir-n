<?php

namespace Modules\User\Http\Controllers\Api;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Models\User;

class UserController extends Controller
{

    /**
     * Create User
     * @param Request $request
     * @return JsonResponse
     */
    public function user(Request $request): JsonResponse
    {
        try {
            return response()->json([
                'status' => true,
                'user'   => $request->user()
            ]);

        }catch (\Throwable $th) {
            return response()->json([
                'status'  => false,
                'message' => $th->getMessage(),
                'trace'   => $th->getTrace()
            ], 500);
        }
    }


    public static function blockChecker( $mobile ): Model|User|null
    {
        return User::where( 'mobile' ,$mobile )->where('is_block' ,1 )->first();
    }

    public static function existChecker( $mobile ): Model|User|null
    {
        return User::where( 'mobile' ,$mobile )->first();
    }


    public static function validator( $status ): object
    {
        return (object)[
            'message' => __("user::authentication.validation.$status"),
            'code'    => match( $status ){
                'blocked_user',
                'maximum_try_count',
                'maximum_send_count',
                'not_found_any_code',
                'incorrect_code',
                'exist_on_queue' => 403,
                'exist_user',
                'not_exist_user',
                'mobile_number_incorrect',
                'forbidden' => 422,
                'success_sent_sms' ,'success_sign_in' ,'success_sign_up' => 200 ,
                'failed' ,'default' => 500
            }
        ];
    }


}
