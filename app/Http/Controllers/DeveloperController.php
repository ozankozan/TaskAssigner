<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Task;

class DeveloperController extends Controller
{
    public function createTaskForDeveloper(Task $task, $developerId)
    {
        $developer = Developer::find($developerId);
        return $developer->tasks()->save($task);
    }
}
