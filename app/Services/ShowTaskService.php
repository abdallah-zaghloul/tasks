<?php
/** @noinspection PhpUndefinedMethodInspection */
namespace App\Services;
use App\Models\Task;

class ShowTaskService
{
    /**
     * @return mixed
     */
    public function execute($id)
    {
        return Task::find($id);
    }
}
