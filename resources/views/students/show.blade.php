

    <h1>All users</h1>
    @if(Session::has('delete'))
    <p class="alert alert-info">{{ Session::get('delete')}}</p>
    @endif
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Email</th>
            <th scope="col">Name</th>
            <th scope="col">Date of Birth</th>
          </tr>
        </thead>
       
            
        
        <tbody>
            @foreach ($arr as $student => $v)
          <tr>
            <th scope="row"></th>
            <td>{{$v['email']['data']}}</td>
            <td>{{$v['name']['data']}}</td>
            <td>{{$v['dob']['data']}}</td>
            <td class="d-flex"><a class="btn btn-info" href="{{route('infoData', $student)}}" name="infoData">Add Course</a></td>
            
            
          </tr>
          @endforeach
        </tbody>
      </table>
      
</div>