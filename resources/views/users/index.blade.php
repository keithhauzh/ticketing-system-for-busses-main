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
        @if ( auth()->user()->role === 'user' )
            <div class="card border border-white">
                    <div class="card-body d-flex justify-content-center flex-column align-items-center">
                        <h1 class="pb-4">Sorry, you are not authorized to view this page..</h1>
                        <a href="/" class="btn btn-success">Go back to the home page?</a>
                    </div>
            </div>    
        @endif

        @if ( ( auth()->user()->role === 'admin' ) || ( auth()->user()->role === 'tm' ) )
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Tickets</h1>
                </div>
                @foreach( $users as $user )
                    @if (auth()->user()->id === $user->id)
                        <div class="card d-flex justify-content-space-between flex-row mt-3">
                            <div class="card-body">
                                <h3>This is you: {{ $user->name }}</h3>
                                <h4>
                                    @if ($user->role === 'admin')
                                        Admin
                                    @endif

                                    @if ($user->role === 'user')
                                        User
                                    @endif

                                    @if ($user->role === 'tm')
                                        Ticket Manager
                                    @endif
                                </h4>
                            </div>
                        </div>
                    @else
                        <div class="card d-flex justify-content-space-between flex-row mt-3">
                            <div class="card-body">
                                <h3>{{ $user->name }}</h3>
                                <h4>
                                    @if ($user->role === 'admin')
                                        Admin
                                    @endif

                                    @if ($user->role === 'user')
                                        User
                                    @endif

                                    @if ($user->role === 'tm')
                                        Ticket Manager
                                    @endif
                                </h4>
                                <div class="d-flex align-items-center gap-2">
                                    <a href="/users/{{ $user->id }}/edit" class="btn btn-primary rounded btn-sm">Change User Role</a>
                                    <form action="/users/{{ $user->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger rounded btn-sm">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    @endauth 
    

@endsection