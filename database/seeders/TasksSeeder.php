<?php /** @noinspection PhpUndefinedMethodInspection */

namespace Database\Seeders;

use App\Enums\TaskStatusEnum;
use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        list($taskModel, $data) = [app(Task::class), array()];

        for ($i = 1; $i < 51; $i++){
            $randomKey = array_rand(TaskStatusEnum::ALL);
            $status = TaskStatusEnum::ALL[$randomKey];
            $name = "dummy task number $i";

            $data[$i] = [
                'name'=> $name,
                'description'=> "dummy task description number $i",
                'status'=> $status,
            ];
        }

        $taskModel->upsert($data,['name']);
    }
}
