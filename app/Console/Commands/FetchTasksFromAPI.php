<?php

namespace App\Console\Commands;

use App\Http\Controllers\Task\BusinessTaskController;
use App\Http\Controllers\Task\ITTaskController;
use Illuminate\Console\Command;

class FetchTasksFromAPI extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:fetchFromApi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch tasks from APIs';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(ITTaskController $itTasks, BusinessTaskController $businessTasks)
    {
        $itTasks->process();
        $businessTasks->process();
    }
}
