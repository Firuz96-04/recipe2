<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<style>
    .head{
        width: 100%;
        height: 80px;
        background: #4db3d2;
        display: flex;
    }
</style>
</head>

<body>
<header class="head">
    <div>
        <a href="{{route("example2")}}">Page 1</a>
        <a href="{{route("home")}}">Home</a>
    </div>

</header>
<div class="container">

        @yield('content')
</div>


</body>
</html>

