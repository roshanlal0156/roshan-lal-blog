<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/header.css">
        <link rel="stylesheet" href="/css/edit-blog.css">
        <link rel="stylesheet" href="/css/footer.css">
        <title>Document</title>
    </head>
    <body>
    @include('header')
    <div class="container edit_blog_body">
        <form action="{{ route('update-blog', ['slug' => $blog->slug])}}" method="post">
            <div>
                <label for="title">Title: </label>
                <textarea name="title" id="title" cols="30" rows="10">{{$blog->title}}</textarea>
            </div>
            <div>
                <label for="description">Description: </label>
                <textarea name="description" id="description" cols="50" rows="10">{{$blog->description}}</textarea>
            </div>
            <div>
                <label for="body">body: </label>
                <textarea name="body" id="body" cols="200" rows="50">{{$blog->body}}</textarea>
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>
    @include('footer')
    <script src="/js/header.js?v=1a040064279b"></script>
</body>
</html>