<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Todos</title>
</head>
<body class="container">
    <h1 class="text-center mb-2 py-2">Todos Page</h1>

    <a href={{ route('ShowFormulaire') }}>
        <button>Add</button>
    </a>
    
    @if(!empty($message))
       <div class="alert alert-danger">
            {{ $message }}
       </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>description</th>
                <th>Opeartion</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tab as $val)
            <tr>
                <td>{{ $val->id }}</td>
                <td>{{ $val->title }}</td>
                <td>{{ $val->description }}</td>
                <td class="d-flex gap-2">
                    <a href={{ route('findbyid',$val->id) }}>
                        <button class="btn btn-primary">View</button>
                    </a>
                    <form action={{ route('deleteTodo',$val->id) }} method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                    <a href={{ route('ShowUpdateForm',$val->id) }}>
                        <button class="btn btn-warning">Update</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
