<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>url short</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        input {
            width: 350px !important;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            width: 400px;
            box-shadow: 0px 1px 8px 7px rgba(34, 60, 80, 0.2);
            border-radius: 15px;
            padding: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }


        .btn {
            width: 100px;
        }

        span {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>

<body>
    @error('url')
    <div class="alert alert-danger">
        {{$message}}
    </div>
    @enderror
    <form action="/" method="POST">
        @csrf
        <span>Short Url</span>
        <input name="url" type="text" class="form-control">
        @if ($tinyUrl ?? false)
            <input value="{{ route('redirect', ['id' => $tinyUrl->unique_hash]) }}" type="text" class="form-control">
        @endif
        <button class="btn btn-primary">Get short</button>
    </form>
</body>

</html>