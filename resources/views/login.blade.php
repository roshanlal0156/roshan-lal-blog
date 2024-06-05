<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css?v=1a040064279b">
    <link rel="stylesheet" href="/css/header.css?v=1a040064279b">
    <link rel="stylesheet" href="/css/login.css?v=erwferfr">
    <link rel="stylesheet" href="/css/footer.css?v=1a040064279b">
    <title>Document</title>
</head>

<body>
    @include('header')
    <div class="container login_body">
        <form action="{{ route('login')}}" method="post" id="loginForm">
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="user_name" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
    @include('footer')
</body>
<script src="/js/header.js?v=1a040064279b"></script>

</html>