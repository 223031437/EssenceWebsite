<style>
.site-navbar{background:rgba(0,0,0,.82);backdrop-filter:blur(10px);padding:18px 0;border-bottom:1px solid rgba(199,154,91,.30);position:relative;z-index:1000}
.site-navbar .site-brand{font-family:'Cormorant Garamond',serif;font-size:1.55rem;letter-spacing:3px;color:#fff;font-weight:600;text-decoration:none;white-space:nowrap}
.site-navbar .site-brand:hover,.site-navbar a:hover{color:#d6ae73}
.site-navbar .site-nav-link{color:#d3d3d3;margin-left:20px;transition:.3s;font-weight:500;text-decoration:none;font-size:.92rem}
.site-navbar .site-nav-link:hover,.site-navbar .site-nav-link.active{color:#d6ae73}
.site-navbar .site-icon{color:#d3d3d3;font-size:1.12rem;margin-left:18px;text-decoration:none;transition:.3s}
.site-navbar .site-icon:hover{color:#d6ae73}
.site-welcome{color:#d6ae73;font-size:.84rem;letter-spacing:.4px;margin-left:18px;white-space:nowrap}
.site-role{color:#888;font-size:.72rem;margin-left:4px;text-transform:uppercase;letter-spacing:1px}
.site-logout{border:0;background:transparent;padding:0;font:inherit}

/* --- Toggler icon (needed since nav no longer relies on Bootstrap's default) --- */
.site-navbar .navbar-toggler{border:1px solid rgba(0,0,0,.15);padding:.35rem .55rem;line-height:1}
.site-navbar .navbar-toggler-icon{
    display:inline-block;
    width:1.4em;
    height:1.4em;
    vertical-align:middle;
    background-repeat:no-repeat;
    background-position:center;
    background-size:100%;
    background-image:url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(0,0,0,0.75)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
}

@media(max-width:991px){
    .site-navbar .site-brand{
        font-size:1.05rem;
        letter-spacing:1.5px;
        white-space:normal;
        line-height:1.2;
    }
    .site-welcome{display:block;margin:10px 0 0}
    .site-navbar .site-nav-link{margin-left:0;margin-right:18px}
    .site-navbar .site-icon{margin-left:0;margin-right:18px}

    /* Stack the collapse content vertically on mobile */
    #siteNavMenu .d-flex.flex-wrap{
        flex-direction:column;
        align-items:flex-start !important;
        padding:12px 0;
    }
    #siteNavMenu .site-nav-link,
    #siteNavMenu .site-icon,
    #siteNavMenu .site-welcome{
        margin:6px 0;
    }
    #siteNavMenu form{display:block;margin-top:6px}
}
</style>

<nav class="site-navbar navbar navbar-expand-lg">
    <div class="container d-flex align-items-center">
        <a class="site-brand me-auto" href="{{ route('home') }}">ESSENCE OF THE MIDDLE EAST</a>

        <button class="navbar-toggler d-lg-none bg-light ms-3" type="button"
                data-bs-toggle="collapse" data-bs-target="#siteNavMenu"
                aria-controls="siteNavMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="siteNavMenu">
            <div class="d-flex flex-wrap align-items-center justify-content-end">
                <a class="site-nav-link" href="{{ route('home') }}">Home</a>
                <a class="site-nav-link" href="{{ route('catalog') }}">Collection</a>
                <a class="site-nav-link" href="{{ route('about.index') }}">About</a>
                <a class="site-nav-link" href="{{ route('contact.index') }}">Contact</a>
                @auth
                    <span class="site-welcome">Welcome {{ auth()->user()->name }}<span class="site-role">({{ auth()->user()->role }})</span></span>
                    <a class="site-icon" href="{{ route('profile') }}" title="Profile" aria-label="Profile"><i class="fa-regular fa-user"></i></a>
                    <a class="site-icon" href="{{ route('cart.index') }}" title="Shopping Bag" aria-label="Shopping Bag"><i class="fa-solid fa-bag-shopping"></i></a>
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button class="site-nav-link site-logout" type="submit">Logout</button>
                    </form>
                @else
                    <span class="site-welcome">Welcome</span>
                    <a class="site-icon" href="{{ route('login') }}" title="Login" aria-label="Login"><i class="fa-regular fa-user"></i></a>
                    <a class="site-icon" href="{{ route('login') }}" title="Shopping Bag"><i class="fa-solid fa-bag-shopping"></i></a>
                @endauth
            </div>
        </div>
    </div>
</nav>