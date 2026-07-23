@extends('layouts.app')

@section('title', 'Admin Panel')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Admin Menu</div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                    
                    @if(auth()->check() && auth()->user()->hasPermission('manage-users'))
                    <a href="{{ route('admin.users.index') }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-users"></i> Users
                    </a>
                    @endif
                    
                  
                </div>
            </div>
        </div>
        <div class="col-md-9">
            @yield('admin-content')
        </div>
    </div>
@endsection