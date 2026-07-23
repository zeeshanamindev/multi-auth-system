<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
        $this->middleware(function ($request, $next) {
            $role = Auth::user()->role;
            if (!in_array($role, ['admin', 'manager'])) {
                abort(403, 'Access denied. Manager only.');
            }
            return $next($request);
        });
    }

    public function index()
    {
        return view('manager.dashboard');
    }
}