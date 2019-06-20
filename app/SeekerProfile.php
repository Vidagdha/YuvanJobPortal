<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeekerProfile extends Model
{
    protected $primaryKey = null;
    public $incrementing = false;

    protected $dates = [
        'date_of_birth',
    ];

    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
