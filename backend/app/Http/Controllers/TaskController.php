<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Repository\Task\ITaskRepo;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //

    private ITaskRepo $taskRepo;
    function __construct(ITaskRepo $taskRepo){
        $this->taskRepo = $taskRepo;
    }

    function store(TaskRequest $request){
        // dd($request->all());
        $task = $this->taskRepo->create($request);
        return response()->json($task,201);
    }

    function index(){
        $tasks = $this->taskRepo->findAll();
        return response()->json($tasks,200);
    }

    function show($id){
        $task = $this->taskRepo->findById($id);
        return response()->json($task,200);
    }

    function update($id,TaskRequest $taskRequest){
        $task = $this->taskRepo->update($id,$taskRequest);
        return response()->json($task,200);
    }

    function destroy($id){
        $this->taskRepo->delete($id);
        return response()->json([],200);
    }
}
