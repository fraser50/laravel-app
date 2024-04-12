<html>
    <head>
        <title>List Images</title>
        <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    </head>

    <body>
        @foreach ($images as $image)
            <x-image-preview :image=$image />
        @endforeach
    </body>
</html>