<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConstellationFortune extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date', 'name', 'overall_fortune', 'overall_description', 'love_fortune', 'love_description', 'business_fortune', 'business_description', 'wealth_fortune', 'wealth_description'
    ];
}
