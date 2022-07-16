@extends('layouts.main')

@section('container')

<div class="row justify-content-center">

  @if(session()->has('success_regis'))
  <div class="alert alert-success d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
    <div>
      {{ session('success_regis') }}
    </div>
  </div>
  @endif

  @if(session()->has('error_login'))
  <div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    <div>
      {{ session('error_login') }}
    </div>
  </div>
  @endif

  @if(session()->has('success_logout_a'))
  <div class="alert alert-success d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
    <div>
      {{ session('success_logout_a') }}
    </div>
  </div>
  @endif

  <div class="col-xl-12">
<h1 class="mb-4">Login System</h1>
<form action="/login" method="POST">
  @csrf
<div class="row mb-2">
    <div class="mb-3 col-md-4 form-group">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" required value="{{ old('email') }}">
      @error('email')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
      
      <label for="password" class="form-label mt-3" name="password">Password</label>
      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required>
      @error('password')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    
    </div>
</div>
    <button type="submit" class="btn btn-primary"><i class="fa fa-user"></i> Login</button>
    {{-- Sementara
    <br>
    <a type="button" class="btn btn-primary" href="/admin">Login admin</a>
    <a type="button" class="btn btn-primary" href="/user">Login user</a> --}}
  </form>
    <label for="" class="mt-2">Don't have account?</label>
    <a href="/registrasi" class="text-decoration-none">Register now!</a>
  </div>
</div>

@endsection