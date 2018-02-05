<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketStock extends Model
{
    protected $fillable = ['size'];

    function match(){
        return $this->belongsTo('App\Match');
    }

    function category(){
        return $this->belongsTo('App\Category');
    }

    function stand(){
        return $this->belongsTo('App\Stand');
    }

    function modded_price(){
        $base_price = $this->match->base_price;
        $category_mod = $this->category->price_mod;
        $stand_mod = $this->stand->price_mod;
        return number_format($base_price + $category_mod + $stand_mod, 2);
    }

    function get_stock_data(){
        // return modded price, stock size, match date, category and stand names.
        return [
            'category' => $this->category->name,
            'stand' => $this->stand->name,
            'stock' => $this->size,
            'ticket_price' => $this->modded_price(),
        ];
    }
}
