<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route("getImage")}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="human_image">

        <button type="submit">add image</button>
    </form>
@php
$data = date("Y-m-d")
@endphp
<img src="{{asset("storage/{$data}/9M8EOQ2qTbdcMiVw9tXH5IHZUyZuOSglR8PXx9NP.jpg")}}" width="300" height="300">
</body>
</html>
