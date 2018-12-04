<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    protected $table = 'users';
    protected $fillable = ['is_vip'];

    public function makeAsVip() {
        $this->update(['is_vip'=> 1]);
    }
}
