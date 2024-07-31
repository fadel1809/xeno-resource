<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function showLandingAdminPage(){
        return view('admin/LandingPageAdmin');
    }
    
    public function showRegisterCustomerPage(){
        return view('admin/RegisterCustomer');
    }
    public function showEditCustomerPage(){
        return view('admin/EditCustomer');
    }
    public function showTrackOrderCustomerPage(){
        return view('admin/TrackOrderCustomer');
    }
    public function showDetailOrderCustomerPage(){
        return view('admin/DetailOrder');
    }
    public function showEditOrderPage(){
        return view('admin/EditOrder');
    }
    public function showAddOrderPage(){
        return view('admin/AddOrderCustomer');
    }
}
