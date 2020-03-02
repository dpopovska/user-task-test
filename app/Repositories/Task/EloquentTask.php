<?php 

namespace App\Repositories\Task;

use App\Task;

class EloquentTask implements TaskRepository
{

	/**
	 * @var $model
	 */
	private $model;

	/**
	 * EloquentTask contructor.
	 * 
	 * @param App\Task $task
	 */
	public function __construct(Task $task)
	{
		$this->model = $task;
	}

	/**
	 * Get all tasks
	 * 
	 * @return Illuminate\Database\Eloquent\Collection
	 */
	public function getAll()
	{
		return $this->model->all();
	}

	/**
	 * Get task by id
	 * 
	 * @param  integer $id
	 * @return App\Task
	 */
	public function getById($id)
	{
		return $this->model->find($id);
	}

	/**
	 * Create new task
	 * 
	 * @param  array  $attributes
	 * @return App\Task
	 */
	public function create(array $attributes)
	{
		return $this->model->create($attributes);
	}

	/**
	 * Update a task
	 * 
	 * @param  integer  $id
	 * @param  array  $attributes
	 * @return boolean
	 */
	public function update($id, array $attributes)
	{
		return $this->model->find($id)->update($attributes);
	}

	/**
	 * Delete a task
	 * 
	 * @param  integer $id
	 * @return boolean
	 */
	public function delete($id)
	{
		return $this->model->find($id)->delete();
	}
}

?>