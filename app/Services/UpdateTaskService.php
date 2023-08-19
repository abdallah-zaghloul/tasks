<?php
/** @noinspection PhpUndefinedMethodInspection */
namespace App\Services;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;

class UpdateTaskService
{
    /**
     * @return mixed
     */
    public function execute(UpdateTaskRequest $request)
    {
        $task = tap(Task::findOrFail($request->route('id')))->update($request->validated());
        session()->put('success', 'Updated Successfully');
        return $task;
    }
}
