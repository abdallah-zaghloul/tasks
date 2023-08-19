<?php
/** @noinspection PhpUndefinedMethodInspection */
namespace App\Services;
use App\Models\Task;

class IndexTaskService
{
    /**
     * @return mixed
     */
    public function execute()
    {
        return Task::latest()->paginate(config('orm.pagination_count',20));
    }
}
