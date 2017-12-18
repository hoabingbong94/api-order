<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableDinner extends Model
{
    public $table = 'table_dinner';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'status'
    ];

    public $timestamps = false;
}
