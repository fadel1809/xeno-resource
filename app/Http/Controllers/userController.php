<?php

namespace App\Http\Controllers;

use App\Models\order_details;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function showLandingUserPage($id,Request $request){
        $idCookie = intval($request->cookie('userId'));
        $roleCookie = $request->cookie('role');
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect(route('user.login'))->withErrors(['message' => 'Please login first']);
        }
        if($roleCookie != 'user'){
            return redirect(route('user.login'))->withErrors(['message' => 'Please login first']);
        }
        $orders = Orders::where('user_id','=',$id)->get();
        $user = User::find($id);
        return view('user/LandingPageUser',['data' => $orders],compact('user'));
    }
    public function showDetailOrderUserPage($id,$orderId, Request $request){
        $idCookie = intval($request->cookie('userId'));
        $roleCookie = $request->cookie('role');
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect(route('user.login'))->withErrors(['message' => 'Please login first']);
        }
        if($roleCookie != 'user'){
            return redirect(route('user.login'))->withErrors(['message' => 'Please login first']);
        }
        $user = User::where('id', '=', $id)->first();
        $orders = Orders::where('id','=',$orderId)->first();
        $order_detail = order_details::where('order_id','=',$orderId)->get();
        $foodSum = order_details::where('order_id','=',$orderId)->sum('food');
        $woodSum = order_details::where('order_id','=',$orderId)->sum('wood');
        $steelSum = order_details::where('order_id','=',$orderId)->sum('steel');
        $oilSum = order_details::where('order_id','=',$orderId)->sum('oil');
        $user = User::find($id);
        
        return view('user/DetailOrder',compact('user','orders','foodSum','woodSum','steelSum','oilSum'),['data' => $order_detail]);
    }
}
