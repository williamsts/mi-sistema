<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ url('/admin/upload') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="">Titulo</label>
        <input type="text" name="title">
        <label for="" name="">Imagen</label>
        <input type="file" name="photo">
        <button type="submit" >Enviar</button>
    </form>
</body>
</html>
