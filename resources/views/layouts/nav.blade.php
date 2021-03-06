<div class="container justify-content-center">
    <a class="navbar-brand" href="{{ route('shop') }}" onclick="event.preventDefault(); document.getElementById('change-shop-form').submit();">
        ThinkIT - Shop
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">

        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @if (auth()->check())
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ auth()->user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @if (Request::segment(1) != 'shops')
                            <a class="dropdown-item" href="{{ route('shop.change') }}" onclick="event.preventDefault(); document.getElementById('change-shop-form').submit();">
                                Pick/Change the Shop you're working with
                            </a>
                        @endif
                        @if (auth()->user()->isAdmin())
                            <a class="dropdown-item" href="{{ route('admin.shop') }}">
                                Admin - Shop manager
                            </a>
                        @endif
                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <form id="change-shop-form" action="{{ route('shop.change') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</div>