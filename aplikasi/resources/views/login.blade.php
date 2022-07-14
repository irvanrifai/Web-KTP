@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
  <div class="col-xl-12">
<h1 class="mb-4">Login System</h1>
<form>
<div class="row mb-2">
    <div class="mb-3 col-md-4 form-group">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" name="email" id="email">
      <label for="password" class="form-label mt-3" name="password">Password</label>
      <input type="password" class="form-control" name="password" id="password">
    </div>
</div>
    <button type="submit" class="btn btn-primary"><i class="fa fa-user"></i> Login</button>
    {{-- Sementara
    <br>
    <a type="button" class="btn btn-primary" href="/admin">Login admin</a>
    <a type="button" class="btn btn-primary" href="/user">Login user</a> --}}
    <label for="">or</label>
    <a href="/registrasi" class="text-decoration-none">Register now!</a>
  </form>
  </div>
</div>

@endsection