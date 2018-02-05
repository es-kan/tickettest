<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Match;

class MatchController extends Controller
{
    //
    public function show($date)
    {
        $match = Match::whereDate('date_scheduled', '=',  $date)->first();
        if ($match) {
            $stocks = $match->stocks;
            $result = [$match->date_scheduled];
            foreach($stocks as $stock){
                array_push($result, $stock->get_stock_data());
            }
            return response()->json($result);
        }
        throw new ModelNotFoundException;
    }

    public function reserve($id)
    {
        $ticket = TicketStock->get($id);
        $ticket->$size--;
        $ticket->save();
        return response()->json($ticket, 200);
    }
}
