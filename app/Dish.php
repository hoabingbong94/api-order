<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    public $table = 'dish';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'thumb', 'price', 'description', 'type'
    ];


    public $timestamps = true;
    public function dish()
    {
        return $this->belongsTo('App\OrderDetail');
    }
}
