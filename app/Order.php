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
        'id_user', 'id_dish', 'status', 'quality'
    ];


    public $timestamps = true;

//    public function user() {
//        return $this->belongsToMany('user');
//    }
}

