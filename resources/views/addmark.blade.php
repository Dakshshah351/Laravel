@extends('layouts.faculty_layout')

@push('title')
    <title>Add subject</title>
@endpush

@section('content')
enter a mark:
{{-- {{dd($data);}} --}}
      <input type="text" name="projectname"  value="{{$data -> project}} "><br><br>

  <center><b><u>  <h1>Add Mark</h1></b></u><br> </center>
    <form action="/addproject" method="POST">
        @csrf
enter a mark:
      <input type="number" name="sem" placeholder="Enter Name" value=""><br><br>
        @error('sem')
            {{$message}}<br>
        @enderror
      
        <input type="submit" value="Submit">
   </form>
<br>
    <table border="2px">
        <tr>
            <th>Subject</th>
            <th>Sem</th>
            <th>Division</th>
            <th>Project</th>
        </tr>
        @foreach ($data as $value )
            <tr>
                <td>{{$value->subject}}</td>
                <td>{{$value->sem}}</td>
                <td>{{$value->div}}</td>
                <td>{{$value->project}}</td>
             
                </td>
            </tr>
        @endforeach
    </table>
    <table border="2px">
        <tr>
            <th>Name</th>
            <th>Email</th>
          
            <th>View project</th>
        </tr>
        @foreach ($student as $students )
            <tr>
                <td>{{$students->name}}</td>
                <td>{{$students->email}}</td>
              &nbsp;&nbsp;&nbsp;
                <td><a style="text-decoration:;color:black" href="/addstudentbyfac/{{$students->id}}">Project</a></td>

            </tr>
        @endforeach
    </table>
@endsection
