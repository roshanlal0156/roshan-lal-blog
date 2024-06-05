<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css?v=hgvcggvcg">
    <link rel="stylesheet" href="/css/header.css?v=hgvcggvcg">
    <link rel="stylesheet" href="/css/blogv2.css?v=ferferfe">
    <link rel="stylesheet" href="/css/footer.css?v=hgvcggvcg">
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
    <!-- Include marked.js from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>

    <!-- Include DOMPurify from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/dompurify@2.3.6/dist/purify.min.js"></script>

    <!-- Your custom scripts -->
    <script src="/js/blogv2.js?v=hgjghyj"></script>

    <script>
        // Assuming $body is a variable containing your Markdown content
        var markdownContent = '{{$body}}'; // This should be dynamically replaced with your actual content

        // Convert Markdown to HTML
        var htmlContent = marked.parse(markdownContent);

        // Sanitize the HTML
        var safeHTML = DOMPurify.sanitize(htmlContent);

        // Inject the sanitized HTML into the DOM
        document.querySelector('.blog_body-wrapper').innerHTML = safeHTML;
    </script>

    <script src="/js/header.js?v=1a040064279b"></script>

</body>

</html>