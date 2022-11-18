@extends('layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit User</h1>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-md-4">
            <main class="form-registration w-100 m-auto">   
                <h1 class="h3 mb-3 fw-normal text-center">Edit User Form</h1>
                <form method="post" action="{{ route('admin.update', $user->id) }}" class="mb-5" >
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" required autofocus value="{{ old('name', $user->name) }}">
                @error('name') 
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div> 
                @enderror
            </div>
            <div class="mb-3">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username',$user->username) }}">
                @error('username') 
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div> 
                @enderror
            </div>
            <div class="mb-3">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email',$user->email) }}">
                @error('email') 
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div> 
                @enderror
            </div>
            <div class="mb-3">
                <label for="is_admin">Role</label> 
                <input type="number" min="0" max="1" name="is_admin" class="form-control @error('is_admin') is-invalid @enderror" id="is_admin" placeholder="Role" required value="{{ old('is_admin',$user->is_admin) }}">
                @error('is_admin') 
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div> 
                @enderror
            </div>
            <button class="w-100 btn btn-lg btn-primary mt-1" type="submit">Register</button>
        </form>

</main>
</div>
</div>
@endsection