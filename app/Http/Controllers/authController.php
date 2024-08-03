<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;
use Illuminate\Http\Request;

class authController extends Controller
{
    public function login(Request $request){
    
        $errorMessage  = $request->validate([
            'username' => 'required',
            'password' => 'required|max:10|min:5',
        ],[
            'username.required' => 'Username is empty',
            'password.required' => 'Password is empty',
            'password.min' => 'Passoword have atleast 5 character',
            'password.max' => 'Password have maximum 10 character',
        ]); 
        if(!$errorMessage){
            return redirect()->back();
        }
        $requestData = $request->all();
        
        $username = $requestData['username'];
        $userFound = User::where('username', $username)->first();
        if (!$userFound) {
            return redirect(route('user.login'))->withErrors(['message' => 'User Not Found!']);
        }
        $userPass = $requestData['password'];
        $passwordDB = $userFound['password'];
        $id = $userFound['id'];
        $role = $userFound['role'];
        if (Hash::check($userPass, $passwordDB)) {
            if ($role == 'admin') {
                $oneDay = 60 * 24;
                Cookie::queue('userId', $id, $oneDay);
                return redirect(route('admin.home', ['id' => $id]));
            }
            $oneDay = 60 * 24;
            Cookie::queue('userId', $id, $oneDay);
            return redirect(route('user.home',['id' => $id]));
        } else {
            return redirect(route('user.login'))->withErrors(['message' => 'Password salah']);
        }
    }
    public function showLoginForm(){
        return view('Login');
    }
}
