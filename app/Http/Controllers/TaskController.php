<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\Task\TaskRepository;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * @var $task
     */
    private $task;

    /**
     * TaskController constructor.
     * 
     * @param TaskRepository $repo
     */
    public function __construct(TaskRepository $repo)
    {
    	$this->task = $repo;
    }

    /**
     * Get all tasks.
     * 
     * @param  integer $id
     * @return Illuminate\View
     */
    public function getAllTasks($id = null)
    {
    	$tasks = $this->task->getAll();
    	$editTask = (isset($id)) ? $this->task->getById($id) : null;

    	return view('tasks.index', compact('tasks', 'editTask'));
    }

    /**
     * Store a task.
     * 
     * @param  Request $request
     * @return mixed
     */
    public function postStoreTask(Request $request)
    {
    	$attributes = $request->only(['description']);
    	$this->task->create($attributes);

    	return redirect()->route('task.index');
    }

    /**
     * Update a task.
     * 
     * @param  integer  $id
     * @param  Request $request
     * @return mixed
     */
    public function postUpdateTask($id, Request $request)
    {
    	$attributes = $request->only(['description']);
    	$this->task->update($id, $attributes);

    	return redirect()->route('task.index');
    }

    /**
     * Delete a task.
     * 
     * @param  integer $id
     * @return mixed
     */
    public function postDeleteTask($id)
    {
    	$this->task->delete($id);

    	return redirect()->route('task.index');
    }
}
