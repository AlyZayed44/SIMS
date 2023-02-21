@foreach ($student as $k => $v)
    <label for="">{{ $v['param'] }}</label>
    <label>{{ $v['data'] }}</label><br>
@endforeach
@foreach ($courses as $k => $v)
    <label for="">{{ $v['data'] }}</label>
    <a class="btn btn-info" href="{{ route('removeCourseFromStudent')}}?studentId={{$student[0]['uuid']}}&courseId={{$v['uuid']}}">remove student</a>
    <br>
@endforeach
<td class="d-flex"><a class="btn btn-info" href="{{ route('getCourses', $student[0]['uuid']) }}">Add Course</a>
