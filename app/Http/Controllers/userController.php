<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    


    public function showLandingUserPage($id,Request $request){
        $idCookie = intval($request->cookie('userId'));
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect(route('user.login'))->withErrors(['message' => 'Please login first']);
        }
        $orders = Orders::where('user_id','=',$id)->get();
        $user = User::find($id);
        return view('user/LandingPageUser',['data' => $orders],compact('user'));
    }
    public function showDetailOrderUserPage($id,$orderId, Request $request){
        $idCookie = intval($request->cookie('userId'));
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect(route('user.login'))->withErrors(['message' => 'Please login first']);
        }
        $orders = Orders::where('id','=',$orderId)->get();
        return view('user/DetailOrder', ['data' => $orders] );
    }
}
