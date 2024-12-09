<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SamiJaya Admin</title>
    @vite('resources/sass/app.scss')
</head>

<body class="bg-primary">
    
    <div class="container text-center my-5 bg-light py-5 rounded-5 shadow">
        <h1 class="mb-4">SAMIJAYA ADMIN</h1>
        <img class="img-thumbnail bg-transparent" src="{{ Vite::asset('resources/images/logo/Logo_Tubes_Framework.png') }}" style="width: 200px; border: none" alt="image">
        <div class="col-md-2 offset-md-5 mt-4">
            <div class="d-grid gap-2">
                <a class="btn btn-primary fw-bold" href="{{ route('home')}}">Masuk</a>
            </div>
        </div>
    </div>
    @vite('resources/js/app.js')
</body>

</html>
