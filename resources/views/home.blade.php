<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/header.css">
        <link rel="stylesheet" href="/css/home.css">
        <link rel="stylesheet" href="/css/footer.css">
        <title>Document</title>
    </head>
    <body>
    @include('header')
    <div class="container home_body">
        <ul id="home_body_blogs-ul">
            @foreach ($blogs as $blog)
                <li data-url="{{ url('api/blog/' . $blog->slug) }}">
                    <img src="{{$blog->title_image}}" alt="{{$blog->title}}">
                    <div>
                        @foreach ($blog->tags as $tag)
                            <a href="">#{{$tag}}</a>
                        @endforeach
                        <h1>{{$blog->title}}</h1>
                        <p>{{$blog->description}}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    @include('footer')
    <script src="/js/app2.js"></script>
</body>
</html>