<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/header.css">
        <link rel="stylesheet" href="/css/blog.css">
        <link rel="stylesheet" href="/css/footer.css">
        <title>Document</title>
    </head>
    <body>
    @include('header')
    <div class="container blog_body">
        <div class="blog_body-wrapper">
            {!! $body !!}
        </div>
    </div>
    @include('footer')
    <script src="/js/app.js"></script>
</body>
</html>