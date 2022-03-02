<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include("user.style")

    @yield("title")


</head>

<body>


    @include("user.navbar")
    @yield("content")
    @include("user.footer")
    @include("user.scripts")



</body>

</html>
