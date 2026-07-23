@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>My Profile</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Profile Information</div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                        <p><strong>Role:</strong> 
                            <span class="badge bg-{{ Auth::user()->role === 'admin' ? 'danger' : 'secondary' }}">
                                {{ ucfirst(Auth::user()->role) }}
                            </span>
                        </p>
                        <p><strong>Status:</strong> 
                            @if(Auth::user()->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </p>
                        <p><strong>Joined:</strong> {{ Auth::user()->created_at->format('M d, Y') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Account Settings</div>
                    <div class="card-body">
                        <p>You can update your account settings here.</p>
                        <button class="btn btn-primary">Change Password</button>
                        <button class="btn btn-secondary mt-2">Update Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection