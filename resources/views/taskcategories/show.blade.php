<h1>{{ $task->name }}</h1>
<p class="lead">{{ $task->description }}</p>
<h3>Tasks List of {{$task->name }}</h3>
<table>
    <thead>
        <tr>    
            <th>No</th>
            <th>Name</th>
            <th>Remark </th>
        </tr>
    </thead>
    <tbody>
        @foreach( $task->tasks as $t)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$t->name}}</td>
                <td>{{$t->remark}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

