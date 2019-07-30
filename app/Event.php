<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{

    protected $fillable = ['titre', 'description'];
    use SoftDeletes;

    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}