@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-xl-12">
        <h1 class="mb-4">Register New Account</h1>
        <form action="/registrasi" method="POST">
        @csrf
        <div class="row mb-2">
            <div class="mb-3 col-md-4 form-group">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" required value="{{ old('name') }}">
              @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror

              <label for="email" class="form-label mt-3">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" required value="{{ old('email') }}">
              @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            
            <label for="password" class="form-label mt-3">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required>
            @error('password')
            <div class="invalid-feedback">
                  {{ $message }}
            </div>
            @enderror
            
            </div>
        </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-user-clock"></i> Register</button>
            {{-- Sementara
            <br>
            <a type="button" class="btn btn-primary" href="/admin">Login admin</a>
            <a type="button" class="btn btn-primary" href="/user">Login user</a> --}}
          </form>
            <label for="" class="mt-2">Already have account?</label>
            <a href="/login" class="text-decoration-none">Login!</a>
    </div>
</div>

@endsection