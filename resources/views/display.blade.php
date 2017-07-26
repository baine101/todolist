@extends('layouts.app')

@if(!Auth::check())

    {!! redirect('login') !!}
@endif

@section('content')
    <div class="container">
        <div class="row">
            @if(empty($tasks))
                <h3 class="col lg 12">Sorry their are no tasks available :(</h3>
            @else
            @foreach($tasks as $task)

                                <div class="col lg 4 card blue-grey darken-1" style="text-align: center; padding: 5%">

                                    <div class="row">
                                        <h2>{{$task->title}}</h2>
                                    </div>
                                    <div class="row">
                                        <p>{{$task->desc}}</p>
                                    </div>
                                    <div class="row">
                                        <p>{{$task->due}}</p>
                                    </div>
                                    <div class="row">
                                        <ul>
                                           @include('layouts._assignee')
                                        </ul>
                                    </div>
                                    <div class="row">
                                        <small> Author :{{$task->author}}</small>
                                    </div>
                                    <div class="row">
                                        <form method="post" action="/task/{{$task->id}}/">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="taskId" value="{{$task->id }}">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class=" btn waves-effect waves-light" type="submit" name="delete">
                                                Delete
                                            </button>
                                        </form>
                                    </div>

                                </div>

            @endforeach
            @endif
        </div>
    </div>
@endsection