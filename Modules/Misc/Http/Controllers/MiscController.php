<?php

namespace Modules\Misc\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Modules\Misc\Models\Option;
use RyanChandler\FilamentNavigation\Facades\FilamentNavigation;
use RyanChandler\FilamentNavigation\Models\Navigation;

class MiscController extends Controller
{

    public function index( Request $request)
    {

        if( $request->key ){
            if( $request->key == '_theme' )
                return response([
                    'header_menu'        => FilamentNavigation::get('header_menu'),
                    'first_footer_menu'  => FilamentNavigation::get('first_footer_menu'),
                    'second_footer_menu' => FilamentNavigation::get('second_footer_menu'),
                    'third_footer_menu'  => FilamentNavigation::get('third_footer_menu'),
                    'theme_settings'     => Option::with('meta')->where('key' ,'_theme_settings_' )->first(),
                ]);

            return response(
                Option::with('meta')->where('key' ,$request->key )->get()
            );
        }

        return response(
            []
        );
    }

}
