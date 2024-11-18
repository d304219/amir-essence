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
            <!-- Show Login and Register for guests -->
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        @else
            <!-- User dropdown for logged-in users -->
        <div class="user-dropdown">
            <a href="#" id="userIcon">
                <i id="faUserIcon" class="fa-solid fa-user" style="color: #000000;"></i>
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
<!-- Cart Icon with Product Counter -->
        <a href="/cart" class="cart-icon">
            <i class="fa-solid fa-cart-shopping" style="color: #000000;"></i>
            @if(isset($cartCount) && $cartCount > 0)
                <span class="cart-counter">{{ $cartCount }}</span>
            @endif
        </a>


    </div>
</header>

<style>


    .cart-icon {
    position: relative;
}

.cart-counter {
    position: absolute;
    top: -12px;
    right: -14px;
    border: 1px solid black;
    background-color: rgb(255, 255, 255);
    color: rgb(0, 0, 0);
    border-radius: 50%;
    padding: 2px 6px;
    font-size: 12px;
    font-weight: bold;
}

</style>

<script>// Toggle dropdown visibility on click
    document.getElementById('faUserIcon').addEventListener('click', function(event) {
        event.preventDefault();
        const dropdown = document.getElementById('userDropdownMenu');
        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    });
    
    // Hide dropdown when clicking outside of it
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('userDropdownMenu');
        const userIcon = document.getElementById('faUserIcon');
        if (!dropdown.contains(event.target) && event.target !== userIcon) {
            dropdown.style.display = 'none';
        }
    });
    
</script>
