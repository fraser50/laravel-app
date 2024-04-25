<html>
    <head>
        <title>View Image</title>
        <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    </head>

    <body>
        <div style="width: 50%; margin: auto">
            <h1 style="text-align: center">{{ $image->title }} by {{ $image->author()->first()->name }}</h1>
            <img src="{{ Illuminate\Support\Facades\Storage::url($image->fileName) }}" style="max-width: 25em; max-height: 25em; width:auto; margin: auto"><br>
            <p>{{ $image->description }}</p><br>
            <h3>Comments</h3>
            <form action="/image/{{ $image->getKey() }}" method="post">
                @csrf
                <input type="text" name="message">
                <input type="submit" vlaue="Post"><br>
                
            </form><br>
            <form action="/image/{{ $image->getKey() }}/addtogroup" method="post">
                @csrf
                <select name="addtogroup" id="addtogroup">
                    <option value="none">Select an option</option>
                    @foreach ($groups as $group)
                        <option value="{{ $group->getKey() }}">{{ $group->title }}</option>
                    @endforeach
                    <br>
                    <input type="submit" value="Add to Group">
                </select>
            </form>
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