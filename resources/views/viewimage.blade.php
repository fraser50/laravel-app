<html>
    <head>
        <title>View Image</title>
        <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    </head>

    <body>
        <div style="margin: auto; max-width: fit-content">
            <h1 style="text-align: center">{{ $image->title }}</h1>
            <img src="{{ Illuminate\Support\Facades\Storage::url($image->fileName) }}" style="max-width: 25em; max-height: 25em"><br>
            <p>{{ $image->description }}</p>ID: {{ $image->getKey() }}</p>

        </div>
    </body>
</html>