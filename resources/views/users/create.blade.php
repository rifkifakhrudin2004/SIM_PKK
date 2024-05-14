@extends('layouts.app')

@section('subtitle', 'User')
@section('content_header_title', 'User')
@section('content_header_subtitle', 'Create')

@section('content')
<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah user baru</h3>
        </div>
        <form method="post" action="../user">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username">
                    @error('username')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="level_users">Level Users</label>
                    <input type="text" class="form-control @error('level_users') is-invalid @enderror" id="level_users" name="level_users" placeholder="level_users">
                    @error('level_users')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="status" placeholder="status">
                    @error('status')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary fileinput-button">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
