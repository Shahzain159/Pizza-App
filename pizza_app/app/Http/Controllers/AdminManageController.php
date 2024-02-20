<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class AdminManageController extends Controller
{
    //
    public function manage_customer(){
        $users = User::all();
        return View('Admin.manage_customer', ['users' => $users]);
    }
    public function orders(){

        return View('Admin.order');
    }
    public function reports(){

        return View('Admin.reports');
    }
}
