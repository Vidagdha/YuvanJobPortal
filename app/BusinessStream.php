<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessStream extends Model
{
    public function companies(){
        return $this->hasMany('App\Company');
    }
}
