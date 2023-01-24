@extends('layouts.user_layout')

@section('content')
<style>
    table tr th{border:2px solid black;
       }  
     td{border:2px solid black;}  
       </style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-3">
                <table border="2px" align="center">
                    <tr align="center">
                        <th>Subject</th>
                        <th>Sem</th>
                        <th>Division</th>
                        <th>Project</th>
                        <th>Submit Project</th>
                    </tr>
                    
                    @foreach ($data as $value )
                        <tr align="center">
                            <td>{{$value->subject}}</td>
                            <td>{{$value->sem}}</td>
                            <td>{{$value->div}}</td>
                            <td>{{$value->project}}</td>
                            <td><a class="btn btn-secondary" href="/Submit-Project/{{$value->project}}">Submit Project</a></td>
                            {{-- <td> --}}
                                {{-- <form action="/addproject/{{$value->id}}" method="POST"> --}}
                                    {{-- @csrf --}}
                                    {{-- @method('DELETE') --}}
                                    {{-- <input type="submit" value="Delete"> --}}
                                {{-- </form> --}}
                            {{-- </td> --}}
                        </tr>
                    @endforeach
                </table>
        
                
            </div>

                
            </div>
        </div>
    </div>
</div>
@endsection
