<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Page 1</h1>
    @foreach($testArray as $item)
        {{  "Key: " . $item -> Key }};<br>
        {{  "Value: " . $item -> Value }};<br>
    @endforeach

    <form action="/page/test" method="post">
        @csrf
        <input name="id" placeholder="Id">
        <input type="submit" value="test">
      </form>
</body>
</html>