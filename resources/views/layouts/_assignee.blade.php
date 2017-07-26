@if(!$task->assignee[0] == null)
    @foreach($task->assignee as $assignee)
        <li>{{$assignee}}</li>
    @endforeach
@else
    <li>{{$task->assignee}}</li>
@endif