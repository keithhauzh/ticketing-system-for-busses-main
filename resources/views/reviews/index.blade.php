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
                        <h1 class="pb-4">Thanks for submitting a review!</h1>
                        <a href="/" class="btn btn-success">Go back to the home page?</a>
                    </div>
            </div>    
        @endif

        @if ( auth()->user()->role == 'admin')  

            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Reviews</h1>
                </div>

                @foreach( $reviews as $review )
                    <div class="card d-flex justify-content-space-between flex-row mt-3">
                        <div class="card-body">
                            <h3>{{ $review->title }}</h3>
                            <h4>{{ $review->content }}</h4>
                            <p>Posted by {{$review->name}}</p>
                            <div class="d-flex align-items-center gap-2">
                               <form action="/reviews/{{ $review->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger rounded btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        @endif

        @if ( auth()->user()->role === 'tm' )
        <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Reviews</h1>
                </div>

                @foreach( $reviews as $review )
                    <div class="card d-flex justify-content-space-between flex-row mt-3">
                        <div class="card-body">
                            <h3>{{ $review->title }}</h3>
                            <div class="d-flex align-items-center gap-2">
                                <a href="/reviews/{{ $review->id }}" class="btn btn-success rounded btn-sm">View</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    @endauth

    

@endsection