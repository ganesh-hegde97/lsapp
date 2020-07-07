<nav class="navbar navbar-inverse">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">
        <img src="{{{asset('images/lsapp.png')}}}" width="30" height="30" alt="LSAPP" loading="lazy">
      <span class="text-warning ml-3">{{config('app.name','Blog-Laravel')}}</span>
      </a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav text-center">
        <li><a href="/">Home</a></li>
        <li><a href="/posts">Blogs</a></li>
        <li><a href="/about">About</a></li>
        <li><a href="/services">Services</a></li>
      </ul>
    </div>
    <!--/.nav-collapse -->
</nav>
