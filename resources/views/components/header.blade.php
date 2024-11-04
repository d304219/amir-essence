<header>
    <nav class="navbar">
        <!-- Logo on the left -->
        <div class="logo">
            <a href="/">
                <img src="{{ asset('img/logoLight.png') }}" alt="Logo" class="logo-img">
            </a>
        </div>

        <!-- Navigation in the center -->
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/perfumes">Perfumes</a></li>
            <li><a href="#categories">Categories</a></li>
            <li><a href="#about">About Us</a></li>

            <!-- Admin-only Dashboard link -->
            @auth
                @if (auth()->user()->isAdmin)
                    <li><a href="dashboard/products">Dashboard</a></li>
                @endif
            @endauth
        </ul>
    </nav>

    <!-- Icons on the right -->
    <div class="header-icons">
        @guest
            <!-- Show Login and Register for guests -->
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        @else
            <!-- Show user icon for logged-in users -->
            <a href="/profile">
                <i class="fa-solid fa-user" style="color: #000000;"></i>
            </a>
        @endguest

        <!-- Cart Icon -->
        <a href="#cart">
            <i class="fa-solid fa-cart-shopping" style="color: #000000;"></i>
        </a>
    </div>
</header>
