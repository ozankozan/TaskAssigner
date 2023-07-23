## Task Assigner

A Laravel web application that **pull tasks from 2 different API** and **assign** it to the development team on a weekly basis.

API 1: http://www.mocky.io/v2/5d47f24c330000623fa3ebfa <br>
API 2: http://www.mocky.io/v2/5d47f235330000623fa3ebf7

|Developer | Time | Difficulty|
|-----|------|-------|
|DEV1 | 1h   | 1x|
|DEV2 | 1h   | 2x|
|DEV3 | 1h   | 3x|
|DEV4 | 1h   | 4x |
|DEV5 | 1h   | 5x |

Note: A developer can work 45 hours per week.

## Install

```
  php artisan migrate
  php artisan db:seed --class=DeveloperSeeder
```

## Usage

Run this commands from cli
```
  tasks:fetchFromApi
```

http://localhost:8000/listTasks
