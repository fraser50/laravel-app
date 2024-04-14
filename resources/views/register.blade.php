<html>
    <head>
        <title>Register</title>
    </head>

    <body>
        <form action="/register" method="post">
            @csrf
            <label for="email">Email</label>
            <input type="email" name="email" id="email"><br>
            <label for="name">Username</label>
            <input type="text" name="name" id="name"><br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password"><br>
            <input type="submit" value="Register">
        </form>
    </body>
</html>