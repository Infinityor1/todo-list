<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks=Task::all();
        return response()->json($tasks, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $data=$request->all();
        $task=Task::create([
            'user_id'=>$data['user_id'],
            'task'=>$data['task'],
            'notes'=>$data['notes'],
            'done'=>$data['done'],]
        );
        return response()->json($task,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task=Task::find($id);
        return response()->json($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $data=$request->all();
        $task->update($data);
        /*$affected = DB::table('tasks')
    ->where('id', $data['id'])
    ->update([
            'task'=>$data['task'],
            'notes'=>$data['notes'],
            'done'=>$data['done'],]);*/
        return response()->json("Task ID:{$task->id} updated successfully",200);
            }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json("Task deleted",200);
    }
}