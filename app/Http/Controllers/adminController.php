<?php

namespace App\Http\Controllers;

use App\Models\order_details;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function registerUser(Request $request, $id){
        $errorMessage  = $request->validate([
            'username' => 'required',
            'password' => 'required|max:10|min:5',
            'region' => 'required'
        ],[
            'username.required' => 'Username is empty',
            'password.required' => 'Password is empty',
            'password.min' => 'Passoword have atleast 5 character',
            'password.max' => 'Password have maximum 10 character',
            'region.required'=> 'Region is empty'
        ]); 
        if(!$errorMessage){
            return redirect()->back();
        }
        $requestData = $request->all();
        
        try {
            $password = $requestData['password'];
            $hashedPassword = Hash::make($password, ['rounds' => 12]);
            $requestData['password'] = $hashedPassword;
            $username = User::where('username',$requestData['username'])->first();
            if($username){
                return redirect()->back()->withErrors(['message' => 'Username Registered!']);
            }
            $user = User::create($requestData);
        if (!$user) {
            return redirect()->back()->withErrors(['message' => 'something went wrong']);
        }
        return redirect(route('admin.home',['id' => $id]));
        } catch (\Exception $e) {
            return dd($e);
        }
      
    }
    public function editUser ($id,$customer, Request $request){
        $errorMessage  = $request->validate([
            'username' => 'required',
            'region' => 'required'
            
        ],[
            'username.required' => 'Username is empty',
            'region.required' => 'Region is empty'
        ]); 
        if(!$errorMessage){
            return redirect()->back();
        }
        $requestData = $request->all();
        try {
            DB::table('users')->where(['username' => $customer])->update([
                'username' => $requestData['username'],
                'region' => $requestData['region'],
                'loyalty_point' => $requestData['loyalty_point']
            ]);
            

            return redirect(route('admin.home', ['id' => $id]));

        } catch (\Exception $e) {
            //throw $th;
            return dd($e);
        }

    }
    public function addOrder ($id, $customer, Request $request){
        $errorMessage = $request->validate([
            'total_food' => 'required',
            'total_wood' => 'required',
            'total_steel' => 'required',            
            'total_oil' => 'required'

        ],[
            'total_food.required' => 'Food is empty',
            'total_wood.required' => 'Wood is empty',
            'total_steel.required' => 'Steel is empty',
            'total_oil.required' => 'Oil is empty'
        ]);
        if(!$errorMessage){
            return redirect()->back();
        }
        $requestData = $request->all();
        try {
            $user = User::where('username',$customer)->first();
            $addOrder = Orders::create([
                'user_id' => $user->id,
                'username' => $user->username,
                'total_food' => $requestData['total_food'],
                'total_wood' => $requestData['total_food'],
                'total_steel' => $requestData['total_food'],
                'total_oil' => $requestData['total_food'],
                'order_date' => now()->format('d-m-Y')
            ]);
            if(!$addOrder){
                return redirect()->back()->withErrors(['message'=>'something wrong']);
            }
            
            return redirect(route('admin.track.customer',['id'=>$id,'customer'=>$customer]));
        } catch (\Error $e) {
            throw $e;
        }
    }
    public function editOrder ($id,$customer,$orderId, Request $request){
        $errorMessage  = $request->validate([
            'total_food' => 'required',
            'total_wood' => 'required',
            'total_steel' => 'required',            
            'total_oil' => 'required',
            'order_date' => 'required'

        ],[
            'total_food.required' => 'Food is empty',
            'total_wood.required' => 'Wood is empty',
            'total_steel.required' => 'Steel is empty',
            'total_oil.required' => 'Oil is empty',
            'order_date.required' => 'Order date is empty'
        ]);
        if(!$errorMessage){
            return redirect()->back();
        }
        $requestData = $request->all();
        try {
            DB::table('orders')->where(['id' => $orderId])->update([
                'total_food' => $requestData['total_food'],
                'total_wood' => $requestData['total_wood'],
                'total_steel' => $requestData['total_steel'],
                'total_oil' => $requestData['total_oil'],
                'order_date' => $requestData['order_date']
            ]);

            return redirect(route('admin.track.customer', ['id' => $id,'customer'=>$customer]));

        } catch (\Exception $e) {
            //throw $th;
            return dd($e);
        }        


    }
    public function showLandingAdminPage($id, Request $request)
    {
        $idCookie = intval($request->cookie('userId'));
        $roleCookie = $request->cookie('role');
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect(route('user.login'))->withErrors(['message' => 'Please login first']);
        }
        if($roleCookie != 'admin'){
            return redirect(route('user.login'))->withErrors(['message' => 'Please login first']);
        }
        $admin = User::find($id);
        $users = User::where('role','=', 'user')->get(); 
        return view('admin/LandingPageAdmin',['data' => $users],compact('admin'));
    }
    public function showRegisterCustomerPage($id,Request $request)
    {
        $idCookie = intval($request->cookie('userId'));
        $roleCookie = $request->cookie('role');
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect(route('user.login'))->withErrors(['message' => 'Please login first']);
        }
        if($roleCookie != 'admin'){
            return redirect(route('user.login'))->withErrors(['message' => 'Please login first']);
        }
        return view('admin/RegisterCustomer',['userId'=>$id]);
    }
    public function showEditCustomerPage($id,$customer,Request $request){
        $idCookie = intval($request->cookie('userId'));
        $roleCookie = $request->cookie('role');
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect(route('user.login'))->withErrors(['message' => 'Please login first']);
        }
        if($roleCookie != 'admin'){
            return redirect(route('user.login'))->withErrors(['message' => 'Please login first']);
        }
        $admin = User::find($id);
        $user = User::where('username','=', $customer)->first(); 

        return view('admin/EditCustomer', compact('admin'), compact('user'));
    }
    public function showTrackOrderCustomerPage($id,$customer, Request $request){
        $idCookie = intval($request->cookie('userId'));
        $roleCookie = $request->cookie('role');
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect(route('user.login'))->withErrors(['message' => 'Please login first']);
        }
        if($roleCookie != 'admin'){
            return redirect(route('user.login'))->withErrors(['message' => 'Please login first']);
        }
        $admin = User::find($id);
        $users = User::where('username', '=', $customer)->first();
        $user = User::where('id', '=', $users->id)->first();
        $orders = Orders::where('user_id','=',$users->id)->get();

        return view('admin/TrackOrderCustomer',['data' => $orders], compact('admin','user'));
    }
    public function showEditOrderPage($id,$customer,$orderId, Request $request){
        $idCookie = intval($request->cookie('userId'));
        $roleCookie = $request->cookie('role');
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect(route('user.login'))->withErrors(['message' => 'Please login first']);
        }
        if($roleCookie != 'admin'){
            return redirect(route('user.login'))->withErrors(['message' => 'Please login first']);
        }
        $order = Orders::find($orderId);
        $admin = User::find($id);
        $users = User::where('username', '=', $customer)->first();
        $user =  User::where('id', '=', $users->id)->first();
        return view('admin/EditOrder',compact('order','admin','user'));
    }
    public function showAddOrderPage($id,$customer, Request $request){
        $idCookie = intval($request->cookie('userId'));
        $roleCookie = $request->cookie('role');
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect(route('user.login'))->withErrors(['message' => 'Please login first']);
        }
        if($roleCookie != 'admin'){
            return redirect(route('user.login'))->withErrors(['message' => 'Please login first']);
        }
        $admin = User::find($id);
        $user = User::where('username', '=', $customer)->first();
        return view('admin/AddOrderCustomer',compact('admin','user'));
    }
    public function showDetailOrder($id,$customer, Request $request,$orderId){
        $idCookie = intval($request->cookie('userId'));
        $roleCookie = $request->cookie('role');
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect(route('user.login'))->withErrors(['message' => 'Please login first']);
        }
        if($roleCookie != 'admin'){
            return redirect(route('user.login'))->withErrors(['message' => 'Please login first']);
        }
        $admin = User::find($id);
        $user = User::where('username', '=', $customer)->first();
        $orders = Orders::where('id','=',$orderId)->first();
        $order_detail = order_details::where('order_id','=',$orderId)->get();
        $foodSum = order_details::where('order_id','=',$orderId)->sum('food');
        $woodSum = order_details::where('order_id','=',$orderId)->sum('wood');
        $steelSum = order_details::where('order_id','=',$orderId)->sum('steel');
        $oilSum = order_details::where('order_id','=',$orderId)->sum('oil');

        return view('admin/DetailOrder',compact('admin','user','orders','foodSum','woodSum','steelSum','oilSum'),['data' => $order_detail]);
    }
    public function showAddDetailOrder($id,$customer, Request $request,$orderId){
        $idCookie = intval($request->cookie('userId'));
        $roleCookie = $request->cookie('role');
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect(route('user.login'))->withErrors(['message' => 'Please login first']);
        }
        if($roleCookie != 'admin'){
            return redirect(route('user.login'))->withErrors(['message' => 'Please login first']);
        }
        $admin = User::find($id);
        $user = User::where('username', '=', $customer)->first();
        $orders = Orders::where('id','=',$orderId)->first();
        return view('admin/AddDetailOrder',compact('admin','user','orders'));
    }
       public function showEditDetailOrder($id,$customer, Request $request,$orderId,$orderDetailId){
        $idCookie = intval($request->cookie('userId'));
        $roleCookie = $request->cookie('role');
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect(route('user.login'))->withErrors(['message' => 'Please login first (cookie)']);
        }
        if($roleCookie != 'admin'){
            return redirect(route('user.login'))->withErrors(['message' => 'Please login first']);
        }
        $admin = User::find($id);
        $user = User::where('username', '=', $customer)->first();
        $orders = Orders::where('id','=',$orderId)->first();
        $orderDetail = order_details::find($orderDetailId);
        return view('admin/EditDetailOrder',compact('admin','user','orders','orderDetail'));
    }
    public function addDetailOrder ($id,$customer,$orderId, Request $request){
        $errorMessage  = $request->validate([
            'food' => 'required',
            'wood' => 'required',
            'steel' => 'required',            
            'oil' => 'required',
            'delivery_time' => 'required'

        ],[
            'food.required' => 'Food is empty',
            'wood.required' => 'Wood is empty',
            'steel.required' => 'Steel is empty',
            'oil.required' => 'Oil is empty',
            'delivery_time.required' => 'Order date is empty'
        ]);
        if(!$errorMessage){
            return redirect()->back();
        }      
        $requestData = $request->all();
        try {
            $user = User::where('username','=',$customer)->first();
            order_details::create([
                'order_id' => $orderId,
                'user_id' => $user->id,
                'food' => $requestData['food'],
                'wood' => $requestData['wood'],
                'steel' => $requestData['steel'],
                'oil' => $requestData['oil'],
                'delivery_time' => $requestData['delivery_time']
            ]);
            return redirect(route('admin.detail.order',['id' => $id, 'customer' => $customer,'orderId' =>strval($orderId)   ]));
        } catch (\Error $e) {
            throw $e;
        }
    }
    public function editDetailOrder ($id,$customer,$orderId,$orderDetailId, Request $request){
        $errorMessage  = $request->validate([
            'food' => 'required',
            'wood' => 'required',
            'steel' => 'required',            
            'oil' => 'required',
            'delivery_time' => 'required'

        ],[
            'food.required' => 'Food is empty',
            'wood.required' => 'Wood is empty',
            'steel.required' => 'Steel is empty',
            'oil.required' => 'Oil is empty',
            'delivery_time.required' => 'Delivery Time is empty'
        ]);
        if(!$errorMessage){
            return redirect()->back();
        }      
        $requestData = $request->all();
        try {
            DB::table('order_details')->where(['id' => $orderDetailId])->update([
                'food' => $requestData['food'],
                'wood' => $requestData['wood'],
                'steel' => $requestData['steel'],
                'oil' => $requestData['oil'],
                'delivery_time' => $requestData['delivery_time']
            ]);
            return redirect(route('admin.detail.order',['id' => $id, 'customer' => $customer,'orderId' =>strval($orderId)   ]));
        } catch (\Error $e) {
            throw $e;
        }
    }
}
