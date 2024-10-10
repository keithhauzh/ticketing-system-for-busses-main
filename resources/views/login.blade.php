@extends('layouts.app')

@section('content')
<div class="card rounded shadow-sm mx-auto my-4" style="max-width: 500px;">
    <div class="card-body">
        <h5 class="card-title text-center mb-3 py-3 border-bottom">
            Login to Your Account
        </h5>
        <!-- error box -->
        @if ( $errors->any() )
            <div class="alert alert-danger">
                @foreach ( $errors->all() as $error )
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif
        <!-- sign up form-->
        <form action="/login" method="POST">
            <!--  CSRF token -->
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="text" class="form-control" id="email" name="email" />
            </div>
            <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input
                type="password"
                class="form-control"
                id="password"
                name="password"
            />
            </div>
            <div class="d-grid">
            <button type="submit" class="btn btn-primary btn-fu">
                Login
            </button>
            </div>
        </form>
    </div>
</div>
@endsection