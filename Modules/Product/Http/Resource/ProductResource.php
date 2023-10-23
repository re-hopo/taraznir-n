<?php

namespace Modules\Product\Http\Resource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray( Request $request ): array
    {
        return isset($this->id) ?
            [
                'title'    => $this->title,
                'slug'     => $this->slug,
                'summary'  => $this->summary,
                'content'  => $this->content,
                'cover'    => $this->cover,
                'status'   => $this->status,
                'chosen'   => $this->chosen
            ]:
            [];
    }
}
