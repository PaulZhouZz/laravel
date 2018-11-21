<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tesssst extends Model
{
    protected $table = 'optimized_analyse';
    protected $guarded = [];

    public static function addData($params) {
        print_r($params);
        static::create($params);
    }
}
