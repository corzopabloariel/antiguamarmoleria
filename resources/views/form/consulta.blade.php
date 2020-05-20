<!DOCTYPE html>
<html>
<body>
    <p><strong>NOMBRE:</strong> {{$data["nombre"]}}</p>
    <p><strong>E-MAIL:</strong> <a href="mailto:{{$data['email']}}">{{$data['email']}}</a></p>
    <p><strong>MENSAJE:</strong> {{$data['mensaje']}}</p>
    <hr>
    <p><strong>PRODUCTO:</strong> {{$data["producto"]["name"]}}</p>
</body>
</html>