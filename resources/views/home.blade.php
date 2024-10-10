@extends('layouts.app')

@section('content')
<div class="container min-vh-100">
    <h1>Hello, {{ $name }}</h1>

    @guest
        <div class="card mb-5 border border-white">
            <div class="card-body">
                <a href="/login" class="btn btn-success">Login to your account</a>
            </div>
            <div class="card-body">
                <a href="/signup" class="btn btn-success">Don't have an account? Register here</a>
            </div>
        </div>
    @endguest

    @auth
        <!-- admin -->
        @if ( auth()->user()->role === 'admin' )
        <div class="card mt-4 border border-white">
            <div class="card-body d-flex justify-content-center">
                <h1>Please proceed with your administrative duties via the navigation bar.</h1>
            </div>
        </div>
        @endif

        <!-- ticket manager -->
        @if ( auth()->user()->role === 'tm' )
            <div class="card mt-4 border border-white">
                <div class="card-body d-flex justify-content-center">
                    <h1>Editor features are displayed on the navigation bar.</h1>
                </div>
            </div>
         @endif

        <!-- user -->
        @if (auth()->user()->role === 'user')
        <div class="card mb-5 border border-light">
            <div class="card-body">
                <a href="/tickets" class="btn btn-warning">Buy some tickets!</a>
            </div>
        </div>
        
        <!-- Review section -->
        <div class="card p-5 border border-3 border-black">
            <h1>Leave a review?</h1>
            <p class="mb-4 text-muted" >(don't worry, reviews submitted are anonymous)</p>
            <!-- error box -->
            @if ( $errors->any() )
                <div class="alert alert-danger">
                    @foreach ( $errors->all() as $error )
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            <form action="/reviews" method="POST">
                @csrf
                <!-- title -->
                <div class="form-group mb-3">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>

                <!-- destination -->
                <div class="form-group mb-3">
                    <label for="content">What could we do better?</label>
                    <textarea class="form-control" id="content" name="content" rows="5"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit Review</button>
            </form>
        </div>
        @endif
    @endauth
    
    
</div>
@endsection