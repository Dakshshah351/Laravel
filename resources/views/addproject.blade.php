@extends('layouts.faculty_layout')

@push('title')
    <title>Add subject</title>
@endpush

@section('content')
  <center><b><u>  <h1>Add Project</h1></b></u><br> </center>
    <form action="/addproject" method="POST">
        @csrf

      Sem:  
                    {{-- @while ()
                        
                    @endwhile  --}}
      <input type="number" name="sem" placeholder="Enter Name" value="{{old('sem')}}"><br><br>
        @error('sem')
            {{$message}}<br>
        @enderror
      Div::  <input type="text" name="div" placeholder="div" value="{{old('div')}}"><br><br>
        @error('div')
            {{$message}}<br>
        @enderror
        Subject:<input type="text" name="subject" placeholder="Enter Subject"><br><br>
        @error('subject')
            {{$message}}<br>
        @enderror
        Project:<input type="text" name="project" placeholder="Enter Project"><br><br>
        @error('project')
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
                <td><a href="/addproject/{{$value->id}}/edit">Edit</a></td>
                <td>
                    <form action="/addproject/{{$value->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
