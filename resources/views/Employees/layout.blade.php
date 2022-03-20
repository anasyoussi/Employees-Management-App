<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href=" {{ url('css/app.css') }} ">
    <title>Employees Managment System</title>
    @notifyCss
</head>
<body>
    <div class="container mx-auto">
             @yield('content')
    </div>
    <x:notify-messages />
    @notifyJs
</body>
</html>