<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
class dashboardController extends Controller
{
    public function getDashboard(){
        
        return view('admin.dashboard.dashboard');
    }
   }