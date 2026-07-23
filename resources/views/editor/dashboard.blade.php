@extends('layouts.app')

@section('title', 'Editor Dashboard')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Editor Dashboard</h4>
    </div>
    <div class="card-body">
        @if(Auth::check())
            <div class="alert alert-success">
                Welcome, {{ Auth::user()->name }}! You are logged in as an Editor.
            </div>
        @else
            <div class="alert alert-danger">
                Please <a href="{{ route('login') }}">login</a> to access this page.
            </div>
        @endif
        
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Quick Actions</div>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary w-100 mb-2">
                            <i class="fas fa-plus"></i> Create New Post
                        </a>
                        <a href="#" class="btn btn-info w-100">
                            <i class="fas fa-list"></i> View All Posts
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection