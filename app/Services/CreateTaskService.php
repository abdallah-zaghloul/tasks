<?php
/** @noinspection PhpUndefinedMethodInspection */
namespace App\Services;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;

class CreateTaskService
{
    /**
     * @param StoreTaskRequest $request
     * @return mixed
     */
    public function execute(StoreTaskRequest $request)
    {
        $task = Task::create($request->validated());
        session()->put('success', 'Created Successfully');
        return $task;
    }
}
