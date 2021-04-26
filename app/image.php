<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    public $timestamps = false;
    protected $table='image';
    protected $fillable = ['name'];
    protected $primaryKey = 'id';
}
