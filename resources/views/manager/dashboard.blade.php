@extends('layouts.app')

@section('title', 'Manager Dashboard')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Manager Dashboard</h4>
    </div>
    <div class="card-body">
        @if(Auth::check())
            <div class="alert alert-info">
                Welcome, {{ Auth::user()->name }}! You are logged in as a Manager.
            </div>
        @else
            <div class="alert alert-danger">
                Please <a href="{{ route('login') }}">login</a> to access this page.
            </div>
        @endif
        
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <h5 class="card-title">Content Management</h5>
                        <p class="card-text">Manage all content</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning">
                    <div class="card-body">
                        <h5 class="card-title">Reports</h5>
                        <p class="card-text">View reports and analytics</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Tasks</h5>
                        <p class="card-text">Manage team tasks</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection