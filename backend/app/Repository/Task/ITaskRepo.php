<?php
namespace App\Repository\Task;
use App\Http\Requests\TaskRequest;

interface ITaskRepo{

    function create(TaskRequest $request);

    function findById(int $id);

    function findAll();

    function delete(int $id);

    function update(int $id,TaskRequest $request);
}
