@extends('layouts.main')

@push('title')
    <title>Update Subject</title>
@endpush

@section('main-section')
    Update User<br>
    {{$user}}
    <form action="/addproject/{{ $user->id }}" method="POST">
        @csrf
        @method('PUT')
        Division<input type="text" name="div" value="{{$user->div}}"><br>
        @error('div')
            {{$message}}<br>
        @enderror
        Semister:<input type="text" name="sem" value="{{$user->sem}}"><br>
        @error('sem')
            {{$message}}<br>
        @enderror
      Subject:  <input type="text" name="subject" value="{{$user->subject}}"><br>
        @error('subject')
            {{$message}}<br>
        @enderror
        Project Name:  <input type="text" name="project" value="{{$user->project}}"><br>
        @error('subject')
            {{$message}}<br>
        @enderror
        <input type="submit" value="Update">
    </form>
@endsection
