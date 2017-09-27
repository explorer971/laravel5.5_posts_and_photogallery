<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">

        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav col-md-12">
                <li><a href="/">Home</a></li>
                <li><a href="/posts/create">Add post</a></li>
                <li><a href="/photogallery/image-gallery">
                Photogallery</a></li>
                <li><a href="/photogallery/create">Add photo</a></li>
                <!-- Authentication Links -->
                @guest
                <li class="navbar-right"><a href="{{ route('login') }}">Login</a></li>
                <li class="navbar-right"><a href="{{ route('register') }}">Register</a></li>
                @else
                <li class="dropdown navbar-right">
                    <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
                @endguest
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>