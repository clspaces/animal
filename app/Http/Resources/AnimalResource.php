<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnimalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'type_id'=>$this->type_id,
            'type_name'=>$this->type->name,
            'name'=>$this->name,
            'birthday'=>$this->birthday,
            'age'=>$this->age,
            'area'=>$this->area,
            'fix'=>$this->fix,
            'description'=>$this->description,
            'personality'=>$this->personality,
            'created_at'=>(string)$this->created_at,
            'updated_at'=>(string)$this->updated_at,
            'user_id'=>$this->user_id
        ];
    }
}
