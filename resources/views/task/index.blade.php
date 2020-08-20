@extends('layouts.app')
<script>
    alert('ok');
    $(document).ready(function(){
        alert('OK Javascript');
    });
</script>
@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="/task" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">Task</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task Category</label>

                <div class="col-sm-6">
                    <select name="category_id" id="task-name" class="form-control">
                    @foreach($taskCategories as $taskcategory)
                        <option value="{{$taskcategory->id}}">{{$taskcategory->name}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="remark" class="col-sm-3 control-label">Remark</label>

                <div class="col-sm-6">
                    <input type="text" name="remark" id="remark" class="form-control">
                </div>
            </div>
            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- TODO: Current Tasks -->
    <!-- Current Tasks -->
    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Tasks
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Task</th>
                        <th>Category</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>
                                <td>
                                    {{$task->category->name}}
                                </td>
                                 <!-- Delete Button -->
                                <td>
                                    <form action="/task/{{ $task->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button>Delete Task</button>
                                    </form>
                                </td>
                                <td>
                                    <a href="/tasks/{{$task->id}}">Edit</a>
                                    <a href="/tasks/show/{{$task->id}}">Show</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
