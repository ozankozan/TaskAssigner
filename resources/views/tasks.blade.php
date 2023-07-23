<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Task List</title>
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Task List</a>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <span data-feather="home"></span>
                            Tasks <span class="sr-only">(current)</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <h2>Tasks</h2>
            <div class="table-responsive">
                @if(count($tasks) > 0)
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Duration</th>
                            <th>Difficulty</th>
                            <th>Effort</th>
                            <th>Developer</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->name }}</td>
                                <td>{{ $task->duration }}</td>
                                <td>{{ $task->difficulty }}</td>
                                <td>{{ $task->calculateEffortHour() }}</td>
                                <td>@if($task->developer)
                                        {{ $task->developer->name }}
                                    @endif</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No tasks found.</p>
                @endif
            </div>
        </main>
    </div>
</div>
</body>
</html>
