@extends("layouts.app")

@section('content')

@guest
    <div class="container min-vh-100">
        <div class="card mb-5 border border-white">
            <div class="card-body">
                <a href="/login" class="btn btn-success">Login to your account</a>
            </div>
            <div class="card-body">
                <a href="/signup" class="btn btn-success">Don't have an account? Register here</a>
            </div>
        </div>
    </div>
@endguest

@auth
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Tickets</h1>
            
            @if(auth()->user()->role === 'admin')
                <a href="/tickets/create" class="btn btn-success rounded">Add New Ticket</a>
            @endif

            @if(auth()->user()->role === 'tm')
                <a href="/tickets/create" class="btn btn-success rounded">Add New Ticket</a>
            @endif

        </div>
        @foreach( $tickets as $ticket )
            <div class="card d-flex justify-content-space-between flex-row mt-3">
                <div class="card-body">
                    <h3>{{ $ticket->title }}</h3>
                    <div class="d-flex align-items-center gap-2">

                        @if(auth()->user()->role === 'admin')
                            <a href="/tickets/{{ $ticket->id }}" class="btn btn-success rounded btn-sm">View</a>
                            <a href="/tickets/{{ $ticket->id }}/edit" class="btn btn-primary rounded btn-sm">Edit</a>
                            <form action="/tickets/{{ $ticket->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger rounded btn-sm">Delete</button>
                            </form>
                        @endif

                        @if(auth()->user()->role === 'tm')
                            <a href="/tickets/{{ $ticket->id }}" class="btn btn-success rounded btn-sm">View</a>
                            <a href="/tickets/{{ $ticket->id }}/edit" class="btn btn-primary rounded btn-sm">Edit</a>
                            <form action="/tickets/{{ $ticket->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger rounded btn-sm">Delete</button>
                            </form>
                        @endif

                        @if(auth()->user()->role === 'user')
                            <a href="/tickets/{{ $ticket->id }}" class="btn btn-success rounded btn-sm">View</a>
                        @endif

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endauth

@endsection