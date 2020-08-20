@extends('layouts.app')

@section('content')
 <!-- TODO: Current Tasks -->
    <!-- Current Tasks -->
    <a href="{{route('taskcategories.create')}}">Create Task Category</a>
    @if (count($taskcategories) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Tasks
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Task</th>
                        <th>Description</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($taskcategories as $task)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $task->description }}</div>
                                </td>
                                 <!-- Delete Button -->
                                <td>
                                    <form action="/taskcategories/{{ $task->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button>Delete Task</button>
                                    </form>
                                </td>
                                <td>
                                <a href="{{ route('taskcategories.edit',$task->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="/taskcategories/{{$task->id}}/edit">Edit</a>
                                    <a href="/taskcategories/{{$task->id}}">Show</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    @endsection
