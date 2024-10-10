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
        <h1 class="mb-2">{{ $ticket->title }}</h1>
        <h4>Destination: {{ $ticket->destination }}</h4>
        <h4>
            Estimated time taken for journey to complete: {{ $ticket->traveltime }} minutes
        </h4>
        <h4>
            Price of Ticket: RM{{ $ticket->price }}
        </h4>

        @if (auth()->user()->role === "user")
            <!-- only user can see -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Buy This Ticket Now! :]
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Purchase Confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to buy this Ticket?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>

                            <!-- button responsible for creating receipt -->
                            <form action="/receipts" method="POST">
                                @csrf
                                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                <button type="submit" class="btn btn-primary">
                                    Confirm
                                </button>
                            </form>

                        </div>
                        </div>
                    </div>
                </div>
        @endif        
    </div>
@endauth

@endsection