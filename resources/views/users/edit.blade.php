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
        <h1>Change User Role</h1>
            <!-- error box -->
            @if ( $errors->any() )
            <div class="alert alert-danger">
                @foreach ( $errors->all() as $error )
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif
        <form action="/users/{{ $user->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="name"
                    value="{{ $user->name }}"
                    name="name"
                    disabled
                >
            </div>
            <div class="form-group mb-3">
                <label for="role">Role</label>
                <select name="role" id="role">

                    <option value="user" <?= $user['role'] == 'user' ? "selected" : "" ?> >User</option>

                    <option value="tm" <?= $user['role'] == 'tm' ? "selected" : "" ?> >Ticket Manager</option>

                    <option value="admin" <?= $user['role'] == 'admin' ? "selected" : "" ?> >Admin</option>

                </select>
            </div>


        <button type="submit" class="btn btn-primary mt-4">Update Ticket</button>

        </form>

        

        
    </div>
@endauth

@endsection