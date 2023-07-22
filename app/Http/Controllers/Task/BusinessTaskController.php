<?php

namespace App\Http\Controllers\Task;

use App\Models\Task;

class BusinessTaskController extends TaskController implements TaskInterface
{
    public function process()
    {
        $apiUrl = env('BUSINESS_TASKS_API_URL');
        $apiData = $this->fetchTasksFromAPI($apiUrl);

        $taskList = $this->createTaskList($apiData);
        $this->assignTasksToDevelopers($taskList);

        return $taskList;
    }

    /**
     * @param $tasks
     * @return array
     */
    public function createTaskList($apiData): array
    {
        $taskList = [];

        foreach ($apiData as $task) {

            foreach ($task as $taskName => $taskData) {
                $taskItem = new Task([
                    'name' => $taskName,
                    'difficulty' => $taskData["level"],
                    'duration' => $taskData["estimated_duration"],
                ]);

                if ($taskItem->isValid()) {
                    $taskList[] = $taskItem;
                }
            }
        }
        return $taskList;
    }
}
