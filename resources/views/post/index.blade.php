@php
    /**
    * @see \App\Http\Controllers\PostController::index
    * @var \Assurrussa\GridView\Helpers\GridViewResult $data
    */
@endphp
@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            {!! $data !!}
        </div>
    </div>
@endsection