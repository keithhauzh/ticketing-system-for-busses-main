@extends("layouts.app")

@section('content')

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
    <div class="container">
        <h1>Add New Ticket</h1>
        <!-- error box -->
        @if ( $errors->any() )
            <div class="alert alert-danger">
                @foreach ( $errors->all() as $error )
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif
        <form action="/tickets" method="POST">
            @csrf
            <!-- title -->
            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <!-- destination -->
            <div class="form-group mb-3">
                <label for="destination">Where to where?</label>
                <textarea class="form-control" id="destination" name="destination" rows="5"></textarea>
            </div>

            <!-- travel time -->
            <div class="form-group mb-3">
                <label for="content">Travel Time (Minutes)</label>
                <input type="integer" class="form-control" id="content" name="traveltime">
            </div>

            <!-- price -->
            <div class="form-group mb-3">
                <label for="price">Price (MYR)</label>
                <input type="number" id="price" name="price" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Create Ticket</button>
        </form>

        
    </div>
@endauth 

@endsection