<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['avatar','user_id','facebook','youtube','about'] ;

    public function user() {
        return $this->belongsTo('App\User') ;
    }
}
