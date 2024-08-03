<?php

namespace App\Http\Controllers;

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
            ]);
            

            return redirect(route('admin.home', ['id' => $id]));

        } catch (\Exception $e) {
            //throw $th;
            return dd($e);
        }

    }
    public function addOrder ($id, $customer, Request $request){
        $errorMessage  = $request->validate([
            'food' => 'required',
            'wood' => 'required',
            'steel' => 'required',            
            'oil' => 'required'

        ],[
            'food.required' => 'Food is empty',
            'wood.required' => 'Wood is empty',
            'steel.required' => 'Steel is empty',
            'oil.required' => 'Oil is empty'
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
                'food' => $requestData['food'],
                'wood' => $requestData['wood'],
                'steel' => $requestData['steel'],
                'oil' => $requestData['oil'],
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
            'food' => 'required',
            'wood' => 'required',
            'steel' => 'required',            
            'oil' => 'required'

        ],[
            'food.required' => 'Food is empty',
            'wood.required' => 'Wood is empty',
            'steel.required' => 'Steel is empty',
            'oil.required' => 'Oil is empty'
        ]);
        if(!$errorMessage){
            return redirect()->back();
        }
        $requestData = $request->all();
        try {
            DB::table('orders')->where(['id' => $orderId])->update([
                'food' => $requestData['food'],
                'wood' => $requestData['wood'],
                'steel' => $requestData['steel'],
                'oil' => $requestData['oil'],
            ]);

            return redirect(route('admin.track.customer', ['id' => $id,'customer'=>$customer]));

        } catch (\Exception $e) {
            //throw $th;
            return dd($e);
        }        


    }
    public function showLandingAdminPage($id)
    {
        $admin = User::find($id);
        $users = User::where('role','=', 'user')->get(); 
        return view('admin/LandingPageAdmin',['data' => $users],compact('admin'));
    }
    public function showRegisterCustomerPage($id){
        return view('admin/RegisterCustomer',['userId'=>$id]);
    }
    public function showEditCustomerPage($id,$customer){
        $admin = User::find($id);
        $user = User::where('username','=', $customer)->first(); 

        return view('admin/EditCustomer', compact('admin'), compact('user'));
    }
    public function showTrackOrderCustomerPage($id,$customer){
        $admin = User::find($id);
        $user = User::where('username', '=', $customer)->first();
        $orders = Orders::where('user_id','=',$user->id)->get();

        return view('admin/TrackOrderCustomer',['data' => $orders], compact('admin','user'));
    }
    public function showEditOrderPage($id,$customer,$orderId){
        $order = Orders::find($orderId);
        $admin = User::find($id);
        $user = User::where('username', '=', $customer)->first();
        return view('admin/EditOrder',compact('order','admin','user'));
    }
    public function showAddOrderPage($id,$customer){
        $admin = User::find($id);
        $user = User::where('username', '=', $customer)->first();
        return view('admin/AddOrderCustomer',compact('user'),compact('admin'));
    }
}
