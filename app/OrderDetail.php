<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public $table = 'order_detail';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_order', 'id_dish', 'quatily'
    ];


    public $timestamps = false;

    public function dish()
    {
        return $this->hasOne('App\Dish', 'id', 'id_dish');
    }

    public function order () {
        return $this->belongsTo('App\Order', 'id_order', 'id');
    }
}