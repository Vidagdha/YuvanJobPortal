<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeekerSkillSet extends Model
{
    protected $primaryKey = null;
    public $incrementing = false;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
