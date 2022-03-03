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
        @foreach ($item -> Value as $ite)
            {{"Detail: " . $ite -> Note}};<br>
        @endforeach
        <h3>==============</h3>
    @endforeach

    {{ var_dump(json_encode($testArray))}}

    <form action="/page/test" method="post">
        @csrf
        <input name="id" placeholder="Id">
        <input type="submit" value="test">
    </form>

    <a href="/page/test?id={{"test"}}">click me</a>
</body>
</html>