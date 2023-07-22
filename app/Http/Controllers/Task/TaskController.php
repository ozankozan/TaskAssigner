<?php

namespace App\Http\Controllers\Task;

use App\Models\Developer;
use GuzzleHttp\Client;

class TaskController
{

    const WEEKLY_WORKING_HOURS = 45;

    public function process()
    {
        $apiUrl = $_REQUEST["aa"];

        $assignedTasks = $this->assignTasksToDevelopers($apiUrl);

        return view('tasks', compact('assignedTasks'));
    }

    /**
     * @param $taskList
     * @return mixed
     */
    public function sortByDifficulty(&$taskList)
    {
        // we're sort by ascending difficulty for efficient distribution in loop

        usort($taskList, function ($a, $b) {
            return $b->difficulty - $a->difficulty;
        });
        return $taskList;
    }

    protected function fetchTasksFromAPI($apiUrl)
    {
        $client = new Client();
        $response = $client->get($apiUrl)
            ->getBody()
            ->getContents();
        return json_decode($response, true);
    }

    protected function assignTasksToDevelopers($taskList)
    {
        $unassignedTaskList = [];
        $developers = Developer::all();
        $this->sortByDifficulty($taskList);

        $remainingWorkingHours = $developers->pluck('weekly_capacity', 'id');

        foreach ($taskList as $task) {
            $effortHour = $task->calculateEffortHour();

            $developerId = $remainingWorkingHours->search(function ($capacity) use ($effortHour) {
                return $capacity >= $effortHour;
            });

            if ($developerId !== false) {
                $task->developer_id = $developerId;
                $remainingWorkingHours[$developerId] -= $task->duration;
            } else {
                $unassignedTaskList[] = $task;
            }

            $task->save();
        }

        return $unassignedTaskList;
    }
}
