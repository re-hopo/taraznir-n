<?php

namespace Modules\Misc\Helpers;

use Carbon\Carbon;
use DateTime;
use Exception;
use Hekmatinasser\Verta\Verta;

class MiscHelper
{

    public static function clearingHtml( $content ,$type ) :string
    {
        if ( $type == 0 ){
            return html_entity_decode( strip_tags( $content ) );
        }
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
        if (!empty( $dateOrDateTime ) && $dateOrDateTime[0] > 0 ) {
            $date = self::indexChecker( $dateOrDateTime , 0 );
            $time = self::indexChecker( $dateOrDateTime , 1 );
            $time = empty( $time ) ? $time : verta()->formatTime();

            if( str_starts_with( $date ,'20') ){
                return Verta::instance($date .' '.$time )->format( $format );
            }

            $date = explode( $separator , $date );
            if( count( $date ) === 3 ){
                $jalali = Verta::jalaliToGregorian( $date[0] ,$date[1] ,$date[2]);
                return trim(
                    date_create(implode('-' ,$jalali).' '.$time )->format( $format )
                );
            }
        }
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
}
