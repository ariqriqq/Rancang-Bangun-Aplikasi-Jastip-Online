<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">


  @include('admin.style')
  @include('admin.scripts')

  @yield("title")

</head>

<body>
  <div id="app">
    <div class="main-wrapper">

        @include('admin.navbar')
        @include('admin.sidebar')
        @yield("content")
        @include('admin.footer')


    </div>
  </div>

  </body>
</html>
