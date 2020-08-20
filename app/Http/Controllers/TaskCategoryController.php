<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaskCategory;
Use Carbon\Carbon;

class TaskCategoryController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $tasks = TaskCategory::get();

    return view('taskcategories.index', [
        'taskcategories' => $tasks,
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
        return view('taskcategories.create');
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
        $task = new TaskCategory();
        $task->name = $request->name;
        $task->description = $request->description;

        $task->save();

        return redirect()->action('TaskCategoryController@index');
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
        $task = TaskCategory::find($id);
        return view('taskcategories.show')->withTask($task);
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
        $task = TaskCategory::find($id);
        //echo "Task Name ".$task->name;
        return view('taskcategories.edit',['tasks'=>TaskCategory::get(),'taskcategory'=>$task]);

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

        $t = TaskCategory::find($id);
        $t->name = $request->name;
        $t->description = $request->description;
        echo'task name'.$t->name. 'id =>'.$id;
        $t->save();
       // return response($t);
        return redirect()->action('TaskCategoryController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskCategory $task)
    {
        TaskCategory::findOrFail($task->id)->delete();

    return redirect()->action('TaskCategory@index');
    }
}
