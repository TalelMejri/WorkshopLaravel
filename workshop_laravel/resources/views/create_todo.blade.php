<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container mt-2">
        <form action={{ route('AddTodo') }} method="Post">
            @csrf
            <div>
                <input type="text" class="form-control"  placeholder="title" name="titre">
            </div>
            <div>
                <input type="text"  class="form-control" placeholder="description" name="description">
           </div>
           <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</body>
</html>