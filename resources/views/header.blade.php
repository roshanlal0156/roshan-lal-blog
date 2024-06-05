<div class="container header" id="header">
    <div class="header_logo" data-url="{{ env('BASE_URL') }}">R.L. Blogs</div>
    <div>
        <a class="a-tag header_nav_btns" target="_blank" href="/api">Home</a>
        <a class="a-tag header_nav_btns" target="_blank" href="http://building-a-portfolio-lemon.vercel.app/">RL Portfolio</a>
        <!-- <a class="a-tag header_nav_btns" href="">Authors</a> -->
        @if($hasRoleAuthor)
        <a class="a-tag header_nav_btns" href="{{ route('author-dashboard') }}">Dashboard</a>
        @endif
        @if(!$hasJwtToken)
        <a class="a-tag header_nav_btns" href="{{ route('login-view') }}">Login</a>
        @endif
    </div>
</div>