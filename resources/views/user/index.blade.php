<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">


    @include('user.style')

    @yield("title")

    <link rel="icon" src="{{ asset('assets/img/logo.PNG') }}" type="image/x-icon">

</head>

<body>
@include('sweetalert::alert')
    @include('user.navbar')
    @yield("content")
    @include('user.footer')
    @include('user.scripts')

</body>

</html>
