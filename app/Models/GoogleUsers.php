<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoogleUsers extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'email', 'google_id', 'user_id'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
