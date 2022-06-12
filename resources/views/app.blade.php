{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="{{ mix('/js/app.js') }}" defer></script>
    <style>
        body {
            background-color: lightgray
        }
    </style>
    <title>
    </title>
</head>

<body>
    @inertia
    <script src="https://kit.fontawesome.com/d864f77375.js" crossorigin="anonymous"></script>
</body>

</html> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="{{ mix('/js/app.js') }}" defer></script>

    @include('user.style')

    @yield('title')

    <link rel="icon" src="{{ asset('assets/img/logo.PNG') }}" type="image/x-icon">

</head>

<body>

    @include('user.navbar')
    @inertia
    @include('user.footer')
    @include('user.scripts')

</body>

</html>
