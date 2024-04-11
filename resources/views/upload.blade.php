<html>
    <head>
        <title>Upload Image</title>
    </head>

    <body>
        <form action="/upload" method="post" enctype="multipart/form-data">
            @csrf
            <label for="title">Title</label>
            <input type="text" name="title" id="title"><br>
            <label for="desc">Description</label><br>
            <textarea name="desc" id="desc" placeholder="Enter image description here" rows="6" cols="48"></textarea><br>
            <label for="image" id="image">Image Upload</label>
            <input type="file" name="image" id="image"><br>
            <input type="submit" value="Upload">
        </form>
    </body>
</html>