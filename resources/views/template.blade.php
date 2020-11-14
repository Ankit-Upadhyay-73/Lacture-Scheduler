<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/app.css" rel="stylesheet"/>
    <title>Document</title>
    <script>
        function onAdminClicked()
        {
            window.location = '{{Url('/admin')}}';
        }
    </script>
</head>
<body>
    <nav class="navbar navbar-default shadow-sm p-3 mb-5 bg-white rounded" style="font-family:Comic Sans MS;">
        <span>Online Lacture Scheduler</span>
        <div class="spacer"></div>
        @yield('adminbtn')
    </nav>
    @yield('content')
</body>
</html>