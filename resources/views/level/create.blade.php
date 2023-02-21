<!doctype html>
<html lang="en">
  <head>
    <link href="/css/app.css" rel="stylesheet">
  </head>
  <body>
   
<div class="contaner">
    <h1 class="text-center">Create Level</h1>
</div>
<form method="post" action="{{route('info.store')}}">
    @if(Session::has('done'))
        <p class="alert alert-info">{{ Session::get('done')}}</p>
    
    @endif
    @csrf
    <input type="hidden" value=4 name="type" id="type">
    
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control"  name="name">
        
    </div>
    <div class="mb-3">
      <label for="code" class="form-label">number</label>
      <input type="number" class="form-control"  aria-describedby="emailHelp" name="number" required>
   
    </div>
      </div>
    <div class="mb-3">
      <label for="birthday">Description:</label>
      <input type="text" id="desc" name="desc">
    </div>
   
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
  <script src="/js/app.js"></script>
</body>
</html>