<?php

namespace App\Http\Controllers;

use App\Task;
use App\TaskCategory;
use Illuminate\Http\Request;
Use Carbon\Carbon;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $tasks = Task::get();
        $taskCategories= TaskCategory::get();
    return view('task.index', [
        'tasks' => $tasks,'taskCategories'=>$taskCategories
    ]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        $date = Carbon::now();
        $task = new Task;
        $task->name = $request->name;
        $task->remark=$request->remark;
        $task->start_date= $date;
        $task->category_id= $request->category_id;
        $task->save();

        return redirect('/tasks');
    // Create The Task...
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        return view('task.show')->withTask($task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $task = Task::find($id);
        //echo "Task Name ".$task->name;
        return view('task.create',['tasks'=>Task::get(),'task'=>$task]);

       // return view('task.create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //

        $t = Task::find($id);
        $t->name = $request->name;
        echo'task name'.$t->name. 'id =>'.$id;
        $t->save();
       // return response($t);
        return redirect()->action('TaskController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        Task::findOrFail($task->id)->delete();

    return redirect('/tasks');
    }
}
