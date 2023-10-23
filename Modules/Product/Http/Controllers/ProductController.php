<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\Controller;
use Modules\Blog\Http\Resource\BlogResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
//        return Product::paginate();
    }



    /**
     * Show the specified resource.
     * @param int $id
     * @return BlogResource
     */
    public function show( int $id ): BlogResource
    {
//        return new BlogResource(
//            News::where( 'id' ,$id )->first()
//        );
    }
}
