<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    


    public function showLandingUserPage(){
        return view('user/LandingPageUser');
    }
    public function showDetailOrderUserPage(){
        return view('user/DetailOrder');
    }
}
