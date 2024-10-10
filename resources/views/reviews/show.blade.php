@extends("layouts.app")

@section('content')
<div class="container">
    <h1 class="mb-2">{{ $review->title }}</h1>
    <h4>{{ $review->content }}</h4>
    <p>Posted by {{$review->name}}</p>
</div>    
@endsection