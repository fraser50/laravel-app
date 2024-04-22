<html>
    <head>
        <title>List Groups</title>
        <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    </head>

    <body>
        @foreach ($groups as $group)
            <x-group-preview :group=$group />
        @endforeach
    </body>
</html>