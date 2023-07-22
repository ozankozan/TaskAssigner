<?php

namespace App\Http\Controllers\Task;

interface TaskInterface
{
    public function process();
    public function createTaskList($apiData);
}
