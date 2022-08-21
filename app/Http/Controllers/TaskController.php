<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tasks;

class TaskController extends Controller
{
    public function store(Request $request){
        //dd($request->all());
        $task = new Tasks;

        $this->validate($request,[
            'task'=>'required|max:100|min:5',
        ]);
        $task->task=$request->task;
        $task->save();

        $data=Tasks::all();
        //dd($data);
        return view('task')->with('tasks',$data);
    }

    public function UpdateTaskAsCompleted($id){
        $task=Tasks::find($id);
        $task->isCompleted=1;
        $task->save();
        return redirect()->back();
    }

    public function UpdateTaskAsNotCompleted($id){
        $task=Tasks::find($id);
        $task->isCompleted=0;
        $task->save();
        return redirect()->back();
    }

    public function deletetask($id){
        $task=Tasks::find($id);
        $task->delete();
        return redirect()->back();
    }

    public function updatetaskview($id){
        $task=Tasks::find($id);
        return view('updatetask')->with('taskdata',$task);
    }

    public function updatetask(Request $request){
        $id=$request->id;
        $task=$request->task;
        $data=Tasks::find($id);
        $data->task=$task;
        $data->save();
        $datas=Tasks::all();
        return view('tasks')->with('tasks',$datas);
    }
}
