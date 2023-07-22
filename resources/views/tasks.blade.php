<!DOCTYPE html>
<html>
<head>
    <title>Task Assignments</title>
</head>
<body>
<h1>Task Assignments</h1>

<table>
    <tr>
        <th>Developer Name</th>
        <th>Assigned Tasks</th>
    </tr>

    @foreach($assignedTasks as $developerName => $tasks)
        <tr>
            <td>{{ $developerName }}</td>
            <td>
                @foreach($tasks as $task)
                    {{ $task['name'] }} (Time: {{ $task['time'] }}, Difficulty: {{ $task['difficulty'] }})<br>
                @endforeach
            </td>
        </tr>
    @endforeach
</table>
</body>
</html>
