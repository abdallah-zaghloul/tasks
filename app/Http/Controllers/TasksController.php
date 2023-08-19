<?php /** @noinspection PhpMissingReturnTypeInspection */

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Services\CreateTaskService;
use App\Services\DeleteTaskService;
use App\Services\IndexTaskService;
use App\Services\ShowTaskService;
use App\Services\UpdateTaskService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ResponseTrait;
class TasksController extends Controller
{
    use ResponseTrait;

    /**
     * Display a listing of the resource.
     *
     * @param IndexTaskService $service
     * @return Application|Factory|View
     */
    public function index(IndexTaskService $service)
    {
        $tasks = $service->execute();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTaskRequest $request
     * @param CreateTaskService $service
     * @return RedirectResponse
     */
    public function store(StoreTaskRequest $request, CreateTaskService $service)
    {
        $service->execute($request);
        return $this->webSuccessRedirect('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @param ShowTaskService $service
     * @return RedirectResponse
     */
    public function show(string $id, ShowTaskService $service)
    {
        $task = $service->execute($id);
        return $this->webSuccessRedirect('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @param ShowTaskService $service
     * @return Application|Factory|View
     */
    public function edit(string $id, ShowTaskService $service)
    {
        $task = $service->execute($id);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTaskRequest $request
     * @param UpdateTaskService $service
     * @return RedirectResponse
     */
    public function update(UpdateTaskRequest $request, UpdateTaskService $service)
    {
        $service->execute($request);
        return $this->webSuccessRedirect('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @param DeleteTaskService $service
     * @return RedirectResponse
     */
    public function destroy(string $id, DeleteTaskService $service)
    {
        $service->execute($id);
        return $this->webSuccessRedirect('tasks.index');
    }
}
