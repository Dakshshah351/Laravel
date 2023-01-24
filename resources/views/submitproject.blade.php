@extends('layouts.user_layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form>
                Submit Your Project File Here::
                <input type="file" class="btn btn-success">
                <input type="submit" class="btn btn-success">
                <div class="mb-3">
                    <table border="5px">
                        <tr border="5px">
                            <th border="5px">Subject</th>
                            <th>Sem</th>
                            <th>Division</th>
                            <th>Project</th>
                            <th>Submit Project</th>
                        </tr>
                        @foreach ($data as $value )
                            <tr>
                                <td>{{$value->subject}}</td>
                                <td>{{$value->sem}}</td>
                                <td>{{$value->div}}</td>
                                <td>{{$value->project}}</td>
                                <td><a style="text-decoration: none " href="/submitproject/{{$value->id}}">submit Your Project</a></td>
                             
                            </tr>
                        @endforeach
                    </table>
                </div>

            </form>
            </div>
        </div>
    </div>
</div>
@endsection
