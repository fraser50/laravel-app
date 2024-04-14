<html>
    <head>
        <title>View Image</title>
        <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    </head>

    <body>
        <div style="margin: auto; max-width: fit-content">
            <h1 style="text-align: center">{{ $image->title }} by {{ $image->author()->first()->name }}</h1>
            <img src="{{ Illuminate\Support\Facades\Storage::url($image->fileName) }}" style="max-width: 25em; max-height: 25em"><br>
            <p>{{ $image->description }}</p><br>
            <h3>Comments</h3>
            <form action="/image/{{ $image->getKey() }}" method="post">
                @csrf
                <input type="text" name="message">
                <input type="submit" vlaue="Post">
            </form><br>
            <div>
                @foreach ($comments as $comment)
                    @php
                        $newComment = ["author" => $image->author()->first()->name, "text" => $comment->comment_text];
                    @endphp
                    <x-comment :comment="$newComment" />
                @endforeach
                
            </div>

        </div>
    </body>
</html>