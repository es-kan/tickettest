<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = ['date_scheduled', 'base_price'];

    function stocks() {
        return $this->hasMany('App\TicketStock');
    }
}
