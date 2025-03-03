<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
use App\Models\User;
use App\Models\Shop;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;





class ShopController extends Controller
{

    

    public function shopall(){
        $query = Shop::query();

        $shops = session('shopall', Shop::all());
        $shops = $query->get(); //keywordがない場合に全店舗表示する。

        return view('shopall', compact('shops'));
    }


    //検索機能コード↓

    public function index(Request $request){
        $query = Shop::query();
        //$query = DB::table('shops');//どちらsテーブか一方で  
        //Laravelのクエリビルダーを使用してデータべースのshopルを操作するための準備を行うためのコード
        $keyword = $request->input('keyword');
       

        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%")
                  ->orWhere('feature', 'LIKE', "%{$keyword}%")
                  ->orWhere('place', 'LIKE', "%{$keyword}%")
                  ->orWhere('genre', 'LIKE', "%{$keyword}%");

        $shops = $query->get();

        session(['shopall' => $shops]);
           

        return view('shopall', compact('shops', 'keyword'));
        }
    }
        
       
        
        
        //$shops = Shop::all();
        //return view('shopall', compact('shops'));

        //遷移先のページを決める。
        
        
        
    
    
    public function detail($shop_id, Request $request){

        $shop = Shop::find($shop_id);

        //sessionに値を代入↓
        session([
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'guests' => $request->input('guests'),

        ]);

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

    public function form(){
        return view('questionform');
    }

    public function store(ReservationRequest $request){
        //$this->validate($request, Reservation::$rules);
        //$form = $request->all();
        //Reservation::create($form);
        //return view('done');


        $validated = $request->validate([
            'user_id' => 'required',
            'shop_id' => 'required',
            'reservation_id'=> 'required',
            'reservationDate' => 'required|date',
            'reservationTime' => 'required',
            'reservationNum' => 'required|integer|min:1',
        ]);

        $reservationData = array_merge($validated, [
            'user_id' => Auth::user()->uuid,
            //user_idにログイン中のユーザーのUUIDを取得して追加。。
        ]);

        Reservation::create($reservationData);

        return view('done');
        
    }

    
}