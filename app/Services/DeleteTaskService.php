<?php
/** @noinspection PhpUndefinedMethodInspection */
namespace App\Services;
use App\Models\Task;

class DeleteTaskService
{
    /**
     * @return mixed
     */
    public function execute($id)
    {
        $deleted = Task::findOrFail($id)->delete();
        $deleted and session()->put('success','Deleted Successfully');
        return $deleted;
    }
}
