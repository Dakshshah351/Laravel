@extends('layouts.faculty_layout')

@push('title')
    <title>View Project</title>
@endpush

@section('content')
{{-- @dd($data->name); --}}
<?php

$daksh=  $data->name?>
<style>
  table tr th{
    border: 2px solid black;
    font-size:15px; 
  }
  td{
    border: 2px solid black; 
  }  
</style>    

<table align="center"> 
    
    <tr align="center">
        
        <th>Project Name</th>
        <th>Subject</th>
        <th>Sem</th>
        <th>Div</th>
        <th>Project Name</th>
        <th>Download Project Preview</th>
        <th>Downlaod Project Pdf</th>
        <th>Give Marks</th>
    </tr>
    @foreach ($project as $value )
        <tr align="center">
            <td>{{$value->project}}</td>
            <td>{{$value->subject}}</td>
            <td>{{$value->sem}}</td>
            <td>{{$value->div}}</td>

            <?php

$daksh1=  $value->project?>
{{-- {{$daksh}}
{{$daksh1}} --}}

            <td><center><a class="btn btn-secondary" href="{{ asset('images/'.$daksh.'_'.$daksh1.'.jpg')}}">Preview </a></center></td>
            <td><center><a class="btn btn-secondary" href="{{ asset('images/'.$daksh.'_'.$daksh1.'.jpg')}}" download={{$daksh.'_'.$daksh1}}>Download Image</a><center></td>

            <td><a class="btn btn-secondary" href={{ asset('storage/uploads/'.$daksh.'_'.$daksh1.'.pdf')}} download={{$daksh.'_'.$daksh1}}> Download PDF</a></td>
            <td>
                <form action="/markupload/{{$daksh}}/{{$daksh1}}" method="POST">
                    @csrf   
                    <input type="number" name="mark" id="mark" placeholder="Enter Marks" required>
                    <input class="btn btn-secondary"type="submit" value="Submit">
                </form>
            </td>
        </tr>
        
    @endforeach
</table>
{{-- @dd($daksh)  --}}<div style="display:flex">
{{-- <center><img  src="{{ asset('images/'.$daksh.'.jpg')}}" alt="This Student Not Submited Project"  height="400px" width="400px" ></center> --}}
<br></div>
{{-- <img src="images/{{$data->name}}.jpg"> --}}
{{-- <div ><a href="{{ asset('images/'.$daksh.'_'.$daksh1.'.jpg')}}" download={{$daksh}}><button> Download Image</button></a> --}}
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
</div>{{-- --}}
@endsection
