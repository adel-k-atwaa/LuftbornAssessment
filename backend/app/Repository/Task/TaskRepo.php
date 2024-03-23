<?php
namespace App\Repository\Task;

use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskRepo implements ITaskRepo{

    function create(TaskRequest $request){
        return Task::create($request->validated());
    }

    function findById(int $id){
        return Task::findOrFail($id);
    }

    function findAll()
    {
        return Task::paginate(10);
    }
    function delete(int $id){
        return $this->findById($id)->delete();
    }

    function update(int $id,TaskRequest $request){
        $task = $this->findById($id);
        return $task->update($request->validated());
    }
}
