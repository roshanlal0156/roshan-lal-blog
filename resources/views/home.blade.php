<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/style.css?v=dfsdfsd">
        <link rel="stylesheet" href="/css/header.css?v=ewwewe">
        <link rel="stylesheet" href="/css/home.css?v=regrger">
        <link rel="stylesheet" href="/css/footer.css?v=1a040064279b">
        <title>Document</title>
    </head>
    <body>
    @include('header')
    <div class="container home_body">
        <ul id="home_body_blogs-ul">
            @foreach ($blogs as $blog)
                <li data-url="{{ url('api/blog/' . $blog->slug) }}">
                    <div id="home_body_blogs-ul-li-image-wrapper">
                        <img src="{{env('BASE_URL') . $blog->title_image}}" alt="{{$blog->title}}">
                    </div>
                    <div>
                        @foreach ($blog->tags as $tag)
                            <a href="">#{{$tag}}</a>
                        @endforeach
                        <div id="home_blog_heading">{{$blog->title}}</div>
                        <span>{{$blog->description}}</span>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    @include('footer')
    <script src="/js/app2.js?v=1a040064279b"></script>
    <script src="/js/header.js?v=1a040064279b"></script>
</body>
</html>