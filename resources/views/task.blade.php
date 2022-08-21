<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="text-center">
            <h1>Daily Tasks</h1>
            <div class="row">
                <div class="col-md-12">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                    @endforeach
                    <form action="/saveTask" method="post">
                    {!! csrf_field() !!}
                        <input type="text" class="form-control" name="task"placeholder="Enter your task here">
                        <br>
                        <input type="submit" class="btn btn-primary" value="SAVE">
                        <input type="button" value="CLEAR" class="btn btn-warning">
                    </form>
                    <br><br>
                    <table class="table table-dark">
                        <th>ID</th>
                        <th>task</th>
                        <th>Completed</th>
                        <th>Action</th>
                        
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{$task->id}}</td>
                                <td>{{$task->task}}</td>
                                <td>
                                    @if($task->isCompleted)
                                        <button class="btn btn-success">Completed</button>
                                    @else
                                        <button class="btn btn-warning">Not Completed</button>
                                    @endif
                                </td>
                                <td>
                                    @if(!$task->isCompleted)
                                        <a href="/markascompleted/{{$task->id}}" class="btn btn-primary">Mark As Completed</a>
                                    @else
                                    <a href="/markasnotcompleted/{{$task->id}}" class="btn btn-danger">Mark As Not Completed</a>
                                    @endif
                                    <a href="/deletetask/{{$task->id}}" class="btn btn-warning">Delete</a>
                                    <a href="/updatetask/{{$task->id}}" class="btn btn-success">Update</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>