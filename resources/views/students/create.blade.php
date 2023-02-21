<!doctype html>
<html lang="en">
  <head>
    <link href="/css/app.css" rel="stylesheet">
  </head>
  <body>
   
<div class="contaner">
    <h1 class="text-center">Create User</h1>
</div>
<form method="post" action="{{route('info.store')}}">
    @if(Session::has('done'))
        <p class="alert alert-info">{{ Session::get('done')}}</p>
    
    @endif
    @csrf
    <input type="hidden" value=2 name="type" id="type">
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control @error('email') is-invalid @enderror"  aria-describedby="emailHelp" name="email" required>
    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror"  aria-describedby="emailHelp" name="name">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
      </div>
    <div class="mb-3">
      <label for="birthday">Birthday:</label>
      <input type="date" id="dob" name="dob">
    </div>
   
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
  <script src="/js/app.js"></script>
</body>
</html>