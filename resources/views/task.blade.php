@extends('layouts.app')

@if(!Auth::check())

    {!! redirect('login') !!}
@endif

@section('content')
    <div class="container">
        <div class="card large">
            <div class="row">
                <h2>{{$task->title}}</h2>
            </div>
            <div class="row">
                <div class="col lg 4">
                    <div class="row">
                        {{$task->desc}}
                    </div>
                    <div class="row">Author : {{ $task->author }}</div>
                </div>
                <div class="col lg 4">
                    <ul>
                        @include('layouts._assignee')
                    </ul>
                </div>
            </div>
            <div class="row">
                {{$task->due}}
            </div>
        </div>

    </div>
@endsection