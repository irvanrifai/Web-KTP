@extends('layouts.main')

@section('container')

<h1 class="mb-4">Register New Account</h1>
<form>
<div class="row mb-2">
    <div class="mb-3 col-md-4 form-group">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name">
      <label for="email" class="form-label mt-3">Email</label>
      <input type="text" class="form-control" id="email">
      <label for="password" class="form-label mt-3">Password</label>
      <input type="password" class="form-control" id="password">
    </div>
</div>
    <button type="submit" class="btn btn-primary"><i class="fa fa-user-clock"></i> Register</button>
    {{-- Sementara
    <br>
    <a type="button" class="btn btn-primary" href="/admin">Login admin</a>
    <a type="button" class="btn btn-primary" href="/user">Login user</a> --}}
    <label for="">or</label>
    <a href="/login">Login!</a>
  </form>

@endsection