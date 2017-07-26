@extends('layouts.app')

@if(!Auth::check())

    {!! redirect('login') !!}
@endif

@section('content')
<div class="container">

    <div class="row">
        <div class="col l5"></div>
        <h2>Add a Task</h2>
    </div>
    <div class="row">
        <form class="col s12" method="POST" action="/task">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="input-field col s12">
                    <input id="title" type="text" name="title" class="validate">
                    <label for="title">Title</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <textarea id="desc" name="desc" class="materialize-textarea"></textarea>
                    <label for="desc">Description</label>
                </div>
                <div class="input-field col s6">
                    <select id="assignee" name="assignee[]" multiple>
                        <option value="" disabled selected>Select Assignee's</option>
                        @foreach($users as $user)
                            <option value="{{ $user->name }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <label for="assignee">Assignee's</label>
                </div>

            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="date" name="due" type="text" class="datepicker">
                    <label for="date">Date Due</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light col l6 offset-l3" type="submit" name="action">Submit
            </button>

        </form>
    </div>
</div>

    <script>
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year,
            today: 'Today',
            clear: 'Clear',
            close: 'Ok',
            closeOnSelect: false // Close upon selecting a date,
        });
    </script>

@endsection