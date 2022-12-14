@extends('layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New User</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <main class="form-registration w-100 m-auto">
                <h1 class="h3 mb-3 fw-normal text-center">New User Form</h1>
                <form action="/dashboard/admin" method="post">
                    @csrf
                    <div class="mb-3 form-floating">
                        <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
                        <label for="name">Name</label>
                        @error('name') 
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div> 
                        @enderror
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
                        <label for="username">Username</label>
                        @error('username') 
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div> 
                        @enderror
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                        <label for="email">Email address</label>
                        @error('email') 
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div> 
                        @enderror
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="password" name="password" class="form-control rounded-bottom  @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                        <label for="password">Password</label> 
                        @error('password') 
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