<?php

namespace Modules\Theme\Helpers;

use Carbon\Carbon;
use Closure;
use DateTime;
use Exception;
use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;
use Modules\Theme\Models\Option;

class Helpers
{

    public static function clearingHtml( string $content ,int $type ): string
    {
        if(!$type)
            return html_entity_decode( strip_tags( $content ) );

        return $content;
    }


    public static function indexChecker($data ,$index ,$default = ''): mixed
    {
        if (!empty($data)) {
            if (is_object($data) && isset($data->$index)) {
                return $data->$index;
            }elseif (is_array($data) && isset($data[$index])) {
                return $data[$index];
            }
        }
        return $default;
    }


    public static function slugRectifier( $string )
    {
        if (!empty($string)) {
            $string = trim($string);
            $string = mb_strtolower($string, "UTF-8");
            $string = preg_replace("/[^a-z0-9_\s\-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويپگچةى]#u/", "", $string);
            $string = preg_replace("/[\s-]+/", " ", $string);
            $string = preg_replace("/[\s_]/", '-', $string);
        }
        return $string;
    }

    public static function mobileValidator( $mobile ): bool
    {
        if( preg_match("/^09[0-9]{9}$/" ,$mobile )) {
            return true;
        }
        return false;
    }

    public static function numberConverter( string|int $number ,$inverse = false ): string|int
    {
        if(empty( $number )) return 0;

        $en = ["0","1","2","3","4","5","6","7","8","9"];
        $fa = ["۰","۱","۲","۳","۴","۵","۶","۷","۸","۹"];

        if($inverse){
            return str_replace( $en ,$fa ,$number );
        }
        return str_replace( $fa ,$en ,$number );
    }


    public static function jalaliToGregorianAndConversely( string|null $dateOrDateTime ,string $separator = '-' ,string $format ='Y-m-d' ):string
    {
        if( str_starts_with( $dateOrDateTime ,'0000') ) return '';

        $dateOrDateTime = trim( $dateOrDateTime );
        $dateOrDateTime = explode( ' ', $dateOrDateTime );
        try{
            if (!empty( $dateOrDateTime ) && $dateOrDateTime[0] > 0 ) {
                $date = self::indexChecker( $dateOrDateTime , 0 );
                $time = self::indexChecker( $dateOrDateTime , 1 );
                $time = $time ?: verta()->formatTime();

                if( str_starts_with( $date ,'20') ){
                    return Verta::instance($date .' '.$time )->format( $format );
                }

                $date = explode( $separator ,$date );
                if( count( $date ) === 3 && strlen($date[0]) == 4 && strlen($date[1]) == 2 && strlen($date[2]) == 2 ){
                    $jalali = Verta::jalaliToGregorian( (int)$date[0] ,(int)$date[1] ,(int)$date[2]);
                    return trim(
                        date_create(implode('-' ,$jalali).' '.$time )->format( $format )
                    );
                }
            }
        }catch ( Exception $e){}
        return false;
    }

    public static function jalaliDateValidator( string $date ,$separator = '\/' ): bool|array
    {
        return preg_grep('/^[0-9]{4}\/(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])$/' ,explode("\n" ,$date ));
    }


    /**
     * @throws Exception
     * @throws Exception
     */
    public static function timeElapsedString( $datetime ,$full = false ): string
    {
        $now  = new DateTime;
        $ago  = new DateTime($datetime);
        $diff = $now->diff($ago);
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'سال',
            'm' => 'ماه',
            'w' => 'هفته',
            'd' => 'روز',
            'h' => 'ساعت',
            'i' => 'دقیقه'
        );
        foreach ( $string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v ;
            }
            else {
                unset($string[$k]);
            }
        }
        if (!$full) $string = array_slice( $string ,0 ,1 );
        return $string ? implode(', ', $string ) . ' گذشته' : 'همین الان';
    }



    public static function getDifferentDate( $dateFrom ,$dateTo ,$convert ): ?int
    {
        try {
            if ( $convert ){
                $dateFrom = self::jalaliToGregorianAndConversely( $dateFrom );
                $dateTo   = self::jalaliToGregorianAndConversely( $dateTo );
            }
            $dateFrom = Carbon::parse( $dateFrom );
            $dateTo   = Carbon::parse( $dateTo );
            if ($dateFrom > $dateTo || $dateFrom == $dateTo) {
                return null;
            }
            return $dateFrom->diffInDays( $dateTo );
        } catch (\Exception $e) {
            return null;
        }
    }

    public static function redisHandler( string $key ,Closure|null $value )
    {
        $data = unserialize( Redis::get( $key) );
        if ( empty( $data ) ){
            Redis::set( $key ,serialize( $value() ) );
            return $value();
        }

        return $data;
    }

    public static function redisRemover( $key ): void
    {
        $keys = Redis::keys( $key);
        if ( !empty( $keys ) && is_array( $keys )){
            foreach ( $keys as $key ){
                Redis::del( str_replace( "taraznir_",'',$key )  );
            }
        }
    }


    public static function commonRedisGetQuery( $key ,$model ,$with ,$limit)
    {
        return self::redisHandler( $key ,function() use($model ,$with ,$limit)
        {
            return
                $model::with($with)
                    ->activeScope()
                    ->orderBy('chosen' ,'DESC')
                    ->limit($limit)
                    ->get();
        });
    }

    public static function commonRedisFirstQuery( $key ,$model ,$with ,$where)
    {
        return self::redisHandler( $key ,function() use($model ,$with ,$where)
        {
            return
                $model::with($with)
                    ->where(...$where)
                    ->activeScope()
                    ->first();
        });
    }

    public static function returnValueIsTrue( $data ,$index ,$value ,$default = '' )
    {
        if ( !empty( self::indexChecker ( $data ,$index ) ) ) {
            return $value;
        }
        return $default;
    }


    public static function checkCurrentPage( $page ): string
    {
        if ( $page == '/'.lcfirst(request()->route()->getName()) || $page == request()->route()->getName() ){
            return 'current-menu-item';
        }
        return '';
    }

    public static function getMetaValueByKey( $model ,string $key ,$default = '')
    {
        if(method_exists($model ,'meta'))
            return $model->meta()->where('key' ,$key)->first()?->value;

        return $default;
    }

    public static function getMetaValuesByKey(Model $model ,string $key ): array
    {
        if(method_exists($model ,'meta'))
            return $model->meta()->where('key' ,$key)->get()->pluck('value' ,'id')->toArray();

        return [];
    }

    public static function getMetaValuesByLikeKeys(Model $model ,string $key ): array
    {
        if(method_exists($model ,'meta'))
            return $model->meta()->where('key' ,'like' ,'%' . $key .'%' )->get()->pluck('value' ,'key')->toArray();

        return [];
    }

    public static function mainPagesSEO()
    {
        return Helpers::redisHandler( 'theme:pages_seo' ,function (){
            return Option::where('key' ,'main_pages_seo')->first();
        });
    }

    public static function seoTagsGenerator( $seo ,$page ,$title ,$detailPage = null) :string
    {
        $d = $detailPage ? self::getMetaValueByKey($seo ,"description" ) : '';
        $k = $detailPage ? self::getMetaValueByKey($seo ,"keywords" )    : '';

        $tags = '
            <title>[title]</title>
            <meta name="keywords" content="[keywords]">
            <meta name="description" content="[description]">
            <meta property="og:locale" content="fa_IR" />
            <meta property="og:type" content="[target]">
            <meta property="og:title" content="[title]">
            <meta property="og:url" content="[url]">
            <meta property="og:image" content="[image]">
            <meta property="og:description" content="[description]">
            <meta property="twitter:card" content="summary_large_image">
            <meta property="twitter:url" content="[url]">
            <meta property="twitter:title" content="[title]">
            <meta property="twitter:description" content="[description]">
            <meta property="twitter:image" content="[image]">
            <meta name="twitter:creator" content="@taraznir" />
            <meta name="twitter:site" content="@taraznir" />
        ';

        if($page)
            $tags = str_replace('[target]', 'website', $tags);
        else
            $tags = str_replace('[target]', 'article', $tags);

        if( !$d && $page && $seo){
            $d = self::getMetaValueByKey($seo ,"{$page}_description" );

            if(!$d)
                $d = self::getMetaValueByKey($seo ,"default_description" );
        }

        if( !$k && $page && $seo ){
            $k = self::getMetaValueByKey($seo ,"{$page}_keywords" );
            if(!$k)
                $k = self::getMetaValueByKey($seo ,"default_keywords" );
        }

        $cover = route('/') . config('theme.logo.1x');
        $tags  = str_replace( '[image]'       ,$cover            ,$tags );
        $tags  = str_replace( '[title]'       ,$title            ,$tags );
        $tags  = str_replace( '[url]'         ,url()->current()  ,$tags );
        $tags  = str_replace( '[description]' ,$d ,$tags );
        return   str_replace( '[keywords]'    ,$k ,$tags );
    }



}
