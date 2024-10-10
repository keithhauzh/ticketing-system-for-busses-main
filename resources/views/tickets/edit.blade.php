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
        <h1>Edit Ticket</h1>
            <!-- error box -->
            @if ( $errors->any() )
            <div class="alert alert-danger">
                @foreach ( $errors->all() as $error )
                    <div>{{ $error }}</div>
                @endforeach
        </div>
        @endif
        <form action="/tickets/{{ $ticket->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="title"
                    value="{{ $ticket->title }}"
                    name="title">
            </div>
            <div class="form-group mb-3">
                <label for="traveltime">Travel Time (minutes)</label>
                <input type="number" class="form-control" id="traveltime" name="traveltime" rows="1" value="{{ $ticket->traveltime }}">
            </div>
            <div class="form-group mb-3">
                <label for="destination">Destination</label>
                <textarea class="form-control" id="destination" name="destination" rows="5">{{ $ticket->destination }}</textarea>
            </div>
            <div class="form-group mb-3">
                <label for="price">price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $ticket->price }}">
                    
                </input>
            </div>


        <button type="submit" class="btn btn-primary mt-4">Update Ticket</button>

        </form>

        

        
    </div>
@endauth

@endsection