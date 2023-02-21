<!doctype html>
<html lang="en">
  <head>
    <link href="/css/app.css" rel="stylesheet">
  </head>
  <body>
   
<div class="contaner">
    <h1 class="text-center">Create User</h1>
</div>
<form method="post" action="{{route('grade.store')}}?page=student">
    @if(Session::has('done'))
        <p class="alert alert-info">{{ Session::get('done')}}</p>
    
    @endif
    @csrf
    <input type="hidden" name="coursesId" value="{{$uuid}}">
    <label for="courses" class="form-label">students</label>
    @foreach ($arr as $student => $v)
    <input type="checkbox" id="" name="studentId[]" value="{{$v['name']['uuid']}}">
    <label for="data"> {{$v['name']['data']}}</label><br>    
    @endforeach
   
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
  <script src="/js/app.js"></script>
</body>
</html>