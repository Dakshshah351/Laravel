@extends('layouts.user_layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    👇👇 Hello   {{ Auth::user()->name }} Enter Project Preview here👇👇     
                   
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                    </div>
                    {{-- <img src="{{assest("storage/images/"session::g      
                                  <img src="images/{{ Session::get('image') }}">
                                  et('img'))}}"> --}}
                    @endif
                 {{-- @dd($project); --}}
                    {{-- {{$project}} --}}
                    {{-- {{ url('canli-yayin/hamleler', [$id]) }} --}}
                    <form action="  {{ url('image-upload', [$project->project]) }}" method="post" enctype="multipart/form-data">
                    {{-- <form action="{{ route('image.store/'{{ $project->project}}) }}" method="POST" enctype="multipart/form-data"> --}}
                        @csrf
              
                        <div class="mb-3">
                            {{-- <label class="form-label" for="inputImage">Image:</label> --}}
                            <input 
                                type="file" 
                                name="image" 
                                id="inputImage"
                                class="form-control @error('image') is-invalid @enderror">
              
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
               
                        <div class="mb-3">
                            <button type="submit" class="btn btn-secondary btn-block mt-1  ">Upload</button>
                        </div>
                   
                    </form>
                    
    <form action="{{ url('fileupload', [$project->project]) }}" method="post" enctype="multipart/form-data">
     
        @csrf
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <strong>{{ $message }}</strong>
        </div>
      @endif
      @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
        <div class="custom-file">
            <input type="file" name="file" class="custom-file-input" id="chooseFile">
            <label class="custom-file-label" for="chooseFile">Select file</label>
        </div>
        <button type="submit" name="submit" class="btn btn-secondary btn-block mt-4">
            Upload Files
        </button>
    </form>
                    
                                </div> 
            </div>
        </div>
 
    </div>
</div>



@endsection
