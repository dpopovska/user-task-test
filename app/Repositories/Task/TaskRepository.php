<?php

namespace App\Repositories\Task;

interface TaskRepository
{
	function getAll();

	function getById($id);

	function create(array $attributes);

	function update($id, array $attributes);

	function delete($id);
}

?>
