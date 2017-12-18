<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $table = 'orders';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'total'
    ];


    public $timestamps = true;

//    public function user() {
//        return $this->belongsToMany('user');
//    }
}

