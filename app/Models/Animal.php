<?php

namespace App\Models;

use Carbon\Carbon;
use Faker\Guesser\Name;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    
    protected $fillable=[
'type_id','name','birthday','area','fix','description','personality','user_id'
    ];
    public function type(){
        return $this->belongsTo('App\Models\Type');
    }
    public function getAgeAttribute(){
        $diff=Carbon::now()->diff($this->birthday);
        return "{$diff->y}歲{$diff->m}月";
    }
}