<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index() {
        return Task::all();
    }

    public function store(Request $request) {
        $task = Task::create([
            'title' => $request->title,
            'completed' => false,
        ]);
        return response()->json($task, 201);
    }

    public function update(Request $request, Task $task) {
        $task->update($request->only(['title', 'completed']));
        return response()->json($task);
    }

	public function destroy(Task $task) {
		$task->delete(); // This will now soft-delete the task
		return response()->json(null, 204);
	}

}

