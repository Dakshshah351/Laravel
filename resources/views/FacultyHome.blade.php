@extends('layouts.faculty_layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                {{-- <img src="images/  {{ Auth::user()->name }}"> --}}
                <div class="card-body">
                    You are a Faculty User.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection