<?php

namespace App\Trait;


use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Misc\Models\Category;

trait CommonApiTrait{

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public static function index(Request $request): Application|ResponseFactory|Response
    {
        $keyword   = $request->keyword   ?: null;
        $limit     = $request->limit     ?: 10;
        $orderBy   = $request->orderBy   ?: 'id';
        $direction = $request->direction ?: 'asc';
        $notIn     = $request->notIn     ?: null;


        if(  $request->filled('keyword') ){
            return response(
                self::$model::search( $keyword )->get()
            );
        }

        if( $request->filled('recent') ){
            return response(
                self::$model::with(['category' ,'meta'])->activeScope()->latest( $orderBy )->take( $limit )->get()
            );
        }

        if( $request->filled('byCategory') ){
            $groups = Category::with('project')->where('slug' ,'<>' ,'mini-slider')->limit(3 )->get();
            $items  = self::$model::with(['category' ,'meta'])->whereHas('category' ,function (Builder $query) {
                $query->where('slug' ,'=' ,'mini-slider');
            })->take( $limit )->get();
            return response([
                'grouped' => $groups,
                'items'   => $items
            ]);
        }

        if( $request->filled('notIn') ){
            return response(
                self::$model::with(['category' ,'meta'])->activeScope()->whereNotIn( 'id' ,explode(',' ,$notIn ) )->latest( $orderBy )->take( $limit )->get()
            );
        }

        $result = self::$model::with(['category' ,'meta'])->orderByScope( $orderBy ,$direction )->activeScope()->paginate( $limit );

        if ($limit)
            $result->appends('limit', $limit);

        if ($orderBy)
            $result->appends('orderBy'   , $orderBy);
            $result->appends('direction' , $direction);

        return response(
            $result
        );
    }



    public function show( string $slug ): response
    {
        return response(
            self::$model::where( 'slug' ,$slug )->activeScope()->first() ?? []
        );
    }



}
