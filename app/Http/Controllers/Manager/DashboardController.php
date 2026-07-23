<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        if (!Auth::check()) {
            redirect()->route('login')->send();
            exit();
        }
        
        if (!in_array(Auth::user()->role, ['admin', 'manager'])) {
            abort(403, 'Access denied. Manager only.');
        }
    }

    public function index()
    {
        return view('manager.dashboard');
    }
}