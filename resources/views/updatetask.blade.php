<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <title>Update task</title>
</head>
<body>
    <br><br><br><br><br>
    <div class="container">
        <form action="/updatetasks" method="post">
        {!! csrf_field() !!}
            <input type="text" class="form-control" name="task" value="{{$taskdata->task}}">
            <input type="hidden" name="id" value="{{$taskdata->id}}">
            <br>
            <input type="submit" value="Update" class="btn btn-warning">
            &nbsp;&nbsp;<input type="button" value="Cancel" class="btn btn-danger">
        </form>
    </div>
</body>
</html>