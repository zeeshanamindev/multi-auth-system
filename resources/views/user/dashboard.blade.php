@extends('layouts.app')

@section('title', 'User Dashboard')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>User Dashboard</h4>
    </div>
    <div class="card-body">
        @if(Auth::check())
            <div class="alert alert-primary">
                Welcome, {{ Auth::user()->name }}! You are logged in as a regular user.
            </div>
        @else
            <div class="alert alert-danger">
                Please <a href="{{ route('login') }}">login</a> to access this page.
            </div>
        @endif
        
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Your Profile</div>
                    <div class="card-body">
                        @if(Auth::check())
                            <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                            <p><strong>Role:</strong> {{ ucfirst(Auth::user()->role) }}</p>
                        @endif
                        <a href="{{ route('user.profile') }}" class="btn btn-info">View Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection