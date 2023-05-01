<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TypeCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray($request)
    {
        return[
            'data'=>$this->collection->transform(function($type){
                return [
                    'id'=>$type->id,
                    'name'=>$type->name,
                    'sort'=>$type->sort
                ];
            })

        ];
    }
}
