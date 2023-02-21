@foreach ($courses as $k => $v)
<label for="">{{$v['param']}}</label>
<label>{{$v['data']}}</label><br>
@endforeach
@foreach ($students as $k => $v)
<label for="">{{$v['data']}}</label>
<br>
@endforeach
<td class="d-flex"><a class="btn btn-info" href="{{route('addStudent',$courses[0]['uuid'])}}">Add Student</a>