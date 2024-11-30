<header>
    <nav class="navbar">
        
        <!-- Mobile menu toggle button -->
        <div class="menu-toggle" id="menuToggle">
            <div></div>
            <div></div>
            <div></div>
        </div>
        
        <!-- Logo on the left -->
        <div class="logo">
            <a href="/">
                <img src="{{ asset('img/logoLight.png') }}" alt="Logo" class="logo-img">
            </a>
        </div>


        <!-- Navigation in the center -->
        <ul id="menu">
            <div class="mobile-top">
                <div class="mobile-nav">
                    <div class="hamburger-auth">
                        <a href="/login">Login</a> /
                        <a href="/register">Register</a>
                    </div>
                    <div id="menuClose" class="hamburger-close">
                        <img src="img/icons/x-lg.svg" alt="">
                    </div>
                </div>
            </div>

            <li><a href="/">Home</a></li>
            <li><a href="/perfumes">Perfumes</a></li>
            <li><a href="/categories">Categories</a></li>
            <li><a href="#about">About Us</a></li>

            <!-- Admin-only Dashboard link -->
            @auth
                @if (auth()->user()->isAdmin)
                    <li><a href="/dashboard/products">Dashboard</a></li>
                @endif
            @endauth
        </ul>
    </nav>

    <!-- Icons on the right -->
    <div class="header-icons">
        @guest
        <div class="header-auth">
            <!-- Show Login and Register for guests -->
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        </div>
        @else
            <!-- User dropdown for logged-in users -->
            <div class="user-dropdown">
                <a href="#" id="userIcon">
                    <img id="faUserIcon" class="icon" src="{{asset('img/icons/person.svg')}}">
                </a>
                <div class="dropdown-menu" id="userDropdownMenu">
                    <a href="#">Profile</a>
                    <a href="#">Settings</a>
                    <a href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </div>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest

        <!-- Cart Icon -->
        <a href="/cart" class="cart-icon">
            <img class="icon" src="{{asset('img/icons/cart.svg')}}">
            @if(isset($cartCount) && $cartCount > 0)
                <span class="cart-counter">{{ $cartCount }}</span>
            @endif
        </a>
    </div>
</header>


<script>// Toggle dropdown visibility on click
document.getElementById('faUserIcon')?.addEventListener('click', function (event) {
    event.preventDefault();
    const dropdown = this.nextElementSibling;
    dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
});

// Hide dropdown when clicking outside of it
document.addEventListener('click', function (event) {
    const dropdown = document.querySelector('.dropdown-menu');
    const userIcon = document.getElementById('faUserIcon');
    if (dropdown && !dropdown.contains(event.target) && event.target !== userIcon) {
        dropdown.style.display = 'none';
    }
});

// Mobile menu toggle functionality
document.getElementById('menuToggle').addEventListener('click', function () {
    const menu = document.getElementById('menu');
    menu.classList.toggle('show');
});

document.getElementById('menuClose').addEventListener('click', function () {
    const menu = document.getElementById('menu');
    menu.classList.remove('show'); // Removes the "show" class to close the menu
});
</script>

    
