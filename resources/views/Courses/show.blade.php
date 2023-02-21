

    <h1>All Courses</h1>
    @if(Session::has('delete'))
    <p class="alert alert-info">{{ Session::get('delete')}}</p>
    @endif
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Code</th>
            <th scope="col">Description</th>
          </tr>
        </thead>
       
            
        
        <tbody>
            @foreach ($arr as $course => $v)
          <tr>
            <th scope="row"></th>
            <td>{{$v['name']['data']}}</td>
            <td>{{$v['code']['data']}}</td>
            <td>{{$v['desc']['data']}}</td>
            <td class="d-flex"><a class="btn btn-info" href="{{route('infoStudents', $course)}}" name="infoStudents">Add Student</a></td>
            
            
          </tr>
          @endforeach
        </tbody>
      </table>
      
</div>