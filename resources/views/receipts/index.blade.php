@extends("layouts.app")

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Your Receipts</h1>
        <a href="/tickets" class="btn btn-success rounded">Buy Another Ticket</a>
    </div>

    @foreach( $receipts as $receipt )
        <div class="card d-flex justify-content-space-between flex-row mt-3">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h3>{{ $receipt->title }}</h3>
                    <h4>Paid RM{{ $receipt->price }}</h4>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <form action="/receipts/{{ $receipt->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger rounded btn-sm">Cancel Order</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection