@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table task-table border">
        <thead>
            <th class="bg-secondary text-white">New Task</th>
        </thead>
        <tbody>
            <tr>
                <td>
                    <form action="{{route('create')}}" method="POST">
                        @csrf
                        <label for="task" class="col-sm-3 control-label">Task</label>
                        <input type="text" name="task" id="task" class="form-control">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <button type="submit" class="btn btn-success mt-2">Add Task</button>
                </form>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="table task-table border mt-3">
        <thead>
            <th class="bg-secondary text-white">Current Tasks</th>
            <th class="bg-secondary"></th>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            @if($task->user_id == Auth::user()->id)
            <tr>
                <td class="table-text">
                    <div>{{ $task->task }}</div>
                </td>
                <td>
                    <form action="{{$task->id}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete Task</button>
                    </form>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection