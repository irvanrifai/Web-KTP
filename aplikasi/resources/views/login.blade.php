@extends('layouts.main')

@section('container')

<h1 class="mb-4">Login System</h1>
<form>
<div class="row mb-2">
    <div class="mb-3 col-md-4 form-group">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" id="username">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password">
    </div>
</div>
    <button type="submit" class="btn btn-primary">Login</button>
  </form>

@endsection