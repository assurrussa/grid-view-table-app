@php
    /**
    * @see \App\Http\Controllers\PostController::index
    * @var \Illuminate\Support\Collection|\App\User[] $users
    */
@endphp
@extends('layouts.app')

@section('content')
    {{--<div id="ami-grid">--}}
    {{--<ami-grid data="[headers: []]"></ami-grid>--}}
    {{--</div>--}}
    <div class="container-fluid">
        <div class="row justify-content-center">
            {!! app(\Assurrussa\GridView\GridView::NAME)->render(['data' => $data]) !!}
        </div>
    </div>
@endsection