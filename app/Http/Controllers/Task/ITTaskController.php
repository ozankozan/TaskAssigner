<?php

namespace App\Http\Controllers\Task;

use App\Models\Task;

class ITTaskController extends TaskController implements TaskInterface
{

    public function process()
    {
        $apiUrl = env('IT_TASKS_API_URL');
        $apiData = $this->fetchTasksFromAPI($apiUrl);

        $taskList = $this->createTaskList($apiData);
        $this->assignTasksToDevelopers($taskList);

        return $taskList;
    }


    public function createTaskList($apiData)
    {
        $taskList = [];

        foreach ($apiData as $task) {
            $taskItem = new Task([
                'name' => $task["id"],
                'difficulty' => $task["zorluk"],
                'duration' => $task["sure"],
            ]);

            if ($taskItem->isValid()) {
                $taskList[] = $taskItem;
            }
        }
        return $taskList;
    }
}
