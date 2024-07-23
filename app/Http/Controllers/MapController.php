<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Map;

use Carbon\Carbon;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * フォームから送信されたデータをDBへ保存する
     */
    public function store(Request $request)
    {

        // dd($request);

        $request->validate([
            "latitude" => "numeric",
            "longitude" => "numeric"
        ]);

        //日本の時刻を設定します
        date_default_timezone_set("Asia/Tokyo");
        $get_date = date("Y-m-d H:i:s");

        // dd($request->amount);
        $amount = $request->amount;

        switch($amount){
            case 0:
                $amount_data = "0杯";
                break;
            case 1:
                $amount_data = "~10杯";
                break;
            case 2:
                $amount_data = "~100杯";
                break;
            case 3:
                $amount_data = "~1,000杯";
                break;
            case 4:
                $amount_data = "~10,000杯";
                break;
            case 5:
                $amount_data = "爆湧き";
                break;
            default:
                break;
        }

        $user_id = \Auth::user()->id;

        $now = Carbon::now();
        $todayNoon = Carbon::today()->addHours(12);
        $yesterdayNoon = Carbon::yesterday()->addHours(12);
        $tomorrowNoon = Carbon::tomorrow()->addHours(12);

        if($now->lt($todayNoon)){
            $startTime = $yesterdayNoon;
            $endTime = $todayNoon;
        }else{
            $startTime = $todayNoon;
            $endTime = $tomorrowNoon;
        }

        $check = DB::table("maps")
                    ->select('user_id')
                    ->where('user_id', '=', $user_id)
                    ->where('created_at', '>=', $startTime)
                    ->where('created_at', '<', $endTime)
                    ->get();

        //今日既に投稿していたら、弾く
        if(count($check) > 0){
            session()->flash('check_message', '送信できるのは一日一回までです');
            return redirect()->route('dashboard');
        }

        $map = new Map;
        $map->user_id = $user_id;
        $map->amount = $amount_data;
        $map->created_at = $get_date;
        $map->latitude = $request->latitude;
        $map->longitude = $request->longitude;
        $map->save();

        return redirect()->route('dashboard');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
