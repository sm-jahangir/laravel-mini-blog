<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if (Auth::user()->can('dashboard-view')) {
            return view('backend.dashboard');
        } else {
            return redirect()->route('admin.401');
        }
        
    }
}
