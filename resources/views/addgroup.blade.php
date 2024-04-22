<html>
    <head>
        <title>Create Group</title>
    </head>

    <body>
        <form action="/addgroup" method="post">
            @csrf
            <label for="title">Title</label>
            <input type="text" name="title" id="title"><br>
            <label for="description">Description</label><br>
            <textarea name="description" id="description" cols="30" rows="10"></textarea><br>
            <input type="submit" value="Create">
        </form>
    </body>
</html>