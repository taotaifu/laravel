<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

这个页面是PhotoController中的create方法 是积极急急急急急急

<form action="{{route ('edu.photo.store')}}" method="post">
         @csrf
    <input type="text" name="title">
    <button>提交</button>
</form>

</body>
</html>