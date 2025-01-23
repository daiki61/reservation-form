<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use App\Models\Reservation;



class ShopController extends Controller
{
    public function shopall(){
        $shops = Shop::all();
        return view('shopall', compact('shops'));
    }

    public function detail($shop_id){
        $shop = Shop::find($shop_id);

        return view('shopdetail', compact('shop'));
    }

    public function showDetails(Request $request, $shop_id){
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'number' => 'required|integer|min:1',
        ]);

        session([
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'number' => $request->input('number'),
        ]);

        $shop = shop::find($shop_id);
        return view('shopdetail', compact('shop'));
    }

    public function done(){
        return view('done');
    }

    public function store(Request $request){
        //$this->validate($request, Reservation::$rules);
        //$form = $request->all();
        //Reservation::create($form);
        //return view('done');


        $validated = $request->validate([
            'uuid' => 'required',
            'shop_id' => 'required',
            'reservationDate' => 'required|date',
            'reservationTime' => 'required',
            'reservationNum' => 'required|integer|min:1',
        ]);

        Reservation::create($validated);

        return view('done');
        
    }

    
}