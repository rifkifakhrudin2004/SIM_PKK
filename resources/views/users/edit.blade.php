@extends('layouts.app')

@section('subtitle', 'User')
@section('content_header_title', 'User')
@section('content_header_subtitle', 'Edit')

@section('content')
<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit user</h3>
        </div>
        <form method="post" action="{{ route('user.edit_simpan', $data->id_users) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ $data->username }}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" id="password" name="password" value="{{ $data->password }}">
                </div>
                <div class="form-group">
                    <label for="level_users">Level users</label>
                    <input type="text" class="form-control" id="level_users" name="level_users" value="{{ $data->level_users }}">
                </div>
                <div class="form-group">
                    <label for="status">status</label>
                    <input type="text" class="form-control" id="status" name="status" value="{{ $data->status }}">
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>
</div>
@endsection
