<?php

namespace App\Http\Controllers\Editor;

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
            if (!in_array($role, ['admin', 'manager', 'editor'])) {
                abort(403, 'Access denied. Editor only.');
            }
            return $next($request);
        });
    }

    public function index()
    {
        return view('editor.dashboard');
    }
}