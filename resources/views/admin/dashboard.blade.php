@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('admin-content')
    <div class="card">
        <div class="card-header">
            <h4>Welcome, {{ Auth::check() ? Auth::user()->name : 'Guest' }}!</h4>
        </div>
        <div class="card-body">
            @if(Auth::check())
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="card text-white bg-primary">
                        <div class="card-body">
                            <h5 class="card-title">Total Users</h5>
                            <h2>{{ $stats['total_users'] ?? 0 }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card text-white bg-success">
                        <div class="card-body">
                            <h5 class="card-title">Active Users</h5>
                            <h2>{{ $stats['active_users'] ?? 0 }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card text-white bg-info">
                        <div class="card-body">
                            <h5 class="card-title">Admins</h5>
                            <h2>{{ $stats['admins'] ?? 0 }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card text-white bg-warning">
                        <div class="card-body">
                            <h5 class="card-title">Managers</h5>
                            <h2>{{ $stats['managers'] ?? 0 }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">User Statistics</div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Editors</span>
                                    <span class="badge bg-primary">{{ $stats['editors'] ?? 0 }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Regular Users</span>
                                    <span class="badge bg-primary">{{ $stats['users'] ?? 0 }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Quick Actions</div>
                        <div class="card-body">
                            {{-- Check permission without Blade directive --}}
                            @if(auth()->check() && auth()->user()->hasPermission('manage-users'))
                            <a href="{{ route('admin.users.create') }}" class="btn btn-success w-100 mb-2">
                                <i class="fas fa-user-plus"></i> Create New User
                            </a>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-info w-100">
                                <i class="fas fa-users"></i> Manage Users
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
       
            @else
                <div class="alert alert-danger">
                    Please <a href="{{ route('login') }}">login</a> to access this page.
                </div>
            @endif
        </div>
    </div>
@endsection