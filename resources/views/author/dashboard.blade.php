<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css?v=hbbbhjbggg">
    <link rel="stylesheet" href="/css/header.css?v=hbbbhjbggg">
    <link rel="stylesheet" href="/css/author/dashboard.css?v=ferfgerg">
    <link rel="stylesheet" href="/css/footer.css?v=hbbbhjbggg">
    <title>Document</title>
</head>

<body>
    @include('header')
    <div class="container author_dashboard_body">
        <h3>create new blog</h3>
        <div id="auther_dashboard_form-new-blog">
            <form action="{{ route('create-new-blog')}}" method="post" enctype="multipart/form-data">
                <div>
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" required>
                </div>
                <div>
                    <label for="description">Description:</label>
                    <input type="text" id="description" name="description" required>
                </div>
                <div>
                    <label for="slug">Slug:</label>
                    <input type="text" id="slug" name="slug" required>
                </div>
                <div>
                    <label for="image">Select image:</label>
                    <input type="file" id="image" name="image" accept="image/*">
                </div>

                <button type="submit">Submit</button>
            </form>
        </div>
        <hr id="author_dashboard-hr" />
        <ul id="auther_body_blogs-ul">
            @foreach ($blogs as $blog)
            <li class="auther_body_blogs-li">
                <h1>{{$blog->title}}</h1>
                <a href="{{ route('preview', ['slug' => $blog->slug])}}">preview</a>
                <a href="{{ route('edit-view', ['slug' => $blog->slug])}}">edit</a>
            </li>
            @endforeach
        </ul>

    </div>
    @include('footer')
</body>
<script src="/js/header.js?v=1a040064279b"></script>
<script>
</script>

</html>