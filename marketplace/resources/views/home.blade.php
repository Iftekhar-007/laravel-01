<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MyShop</title>
<style>
body { font-family: Arial, sans-serif; margin:0; padding:0; }

/* Navbar */
.navbar {
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:15px 40px;
    background:#333;
    color:#fff;
}
.navbar a { color:#fff; text-decoration:none; margin-right:20px; }
.navbar a:hover { color:#ff9800; }

/* Banner */
.banner {
    height:300px;
    background:url('https://picsum.photos/1200/300') center/cover no-repeat;
    display:flex;
    justify-content:center;
    align-items:center;
    color:#fff;
}
.banner h1 {
    background:rgba(0,0,0,0.5);
    padding:20px;
    border-radius:10px;
}

/* Products */
.products { padding:40px; text-align:center; }
.products-grid { display:grid; grid-template-columns:repeat(auto-fit, minmax(250px, 1fr)); gap:20px; }
.product-card {
    border:1px solid #ddd; 
    padding:15px; 
    border-radius:8px;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
    height: 400px; /* fixed height */
}

.product-card img {
    width:100%; 
    height: 200px; /* fixed image height */
    object-fit: cover; /* maintain aspect ratio */
    border-radius:8px;
}

.product-card h3, .product-card p {
    margin:5px 0;
}

.product-card p.description {
    flex-grow:1; /* takes remaining space */
    overflow:hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 3; /* max 3 lines */
    -webkit-box-orient: vertical;
}


/* Pagination */
.pagination-wrapper .pagination {
    display: flex !important;
    justify-content: center !important;
    list-style: none;
    padding: 0;
    margin-top: 20px;
    gap: 5px;
}
.pagination-wrapper .pagination li a,
.pagination-wrapper .pagination li span {
    padding: 4px 10px !important;
    font-size: 12px !important;
    border: 1px solid #ddd;
    border-radius: 4px;
    color: #333;
    text-decoration: none;
}
.pagination-wrapper .pagination li.active span {
    background: #2196f3;
    color: #fff;
    border-color: #2196f3;
}
.pagination-wrapper .pagination li a:hover {
    background: #2196f3;
    color: #fff;
    border-color: #2196f3;
}

.product-buttons {
    margin-top: 10px;
    display: flex;
    justify-content: space-between;
}
.product-buttons button {
    padding: 8px 12px;
    border: none;
    background: #2196f3;
    color: #fff;
    border-radius: 4px;
    cursor: pointer;
}
.product-buttons button:hover {
    background: #1976d2;
}

</style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar" style="display:flex; justify-content:space-between; align-items:center; padding:15px 40px; background:#333; color:#fff;">
    <div class="logo">
        <a href="{{ url('/') }}" style="color:#fff; text-decoration:none; font-weight:bold;">MyShop</a>
    </div>

    <div class="menu">
        <a href="{{ url('/') }}" style="color:#fff; margin-right:20px;">Products</a>
        <a href="{{ url('/dashboard') }}" style="color:#fff; margin-right:20px;">Dashboard</a>
        {{--<a href="{{ url('/add-product') }}" style="color:#fff; margin-right:20px;">Add Product</a> --}}
    </div>

    <div class="auth">
    @guest
        <a href="{{ route('login') }}">
            <button>Login</button>
        </a>
        <a href="{{ route('register') }}">
            <button>Register</button>
        </a>
    @endguest

    @auth
        <span>Welcome, {{ Auth::user()->name }}</span>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @endauth
</div>

</nav>


<!-- Banner -->
<section class="banner">
    <h1>Welcome to MyShop</h1>
</section>

<!-- Products -->
{{-- <section class="products">
    <h2>Our Products</h2>
    <div class="products-grid">
        @foreach($products as $product)
            <div class="product-card">
                <img src="{{ $product->image }}" alt="{{ $product->name }}">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->description }}</p>
                <p><strong>${{ number_format($product->price, 2) }}</strong></p>
                <p>Stock: {{ $product->stock }}</p>
            </div>
        @endforeach
    </div> --}}


    <!-- Products -->
<!-- Products -->
<section class="products">
    <h2>Our Products</h2>
    <div class="products-grid">
        @foreach($products as $product)
            <div class="product-card">
                <!-- Show only first image -->
                @php
                    $images = $product->images ? json_decode($product->images) : [];
                    $firstImage = count($images) ? $images[0] : 'https://via.placeholder.com/250';
                @endphp
                <img src="{{ asset('storage/' . $firstImage) }}" alt="{{ $product->name }}">

                <h3>{{ $product->name }}</h3>
                {{-- <p>{{ $product->description }}</p> --}}
                <p class="description">{{ $product->description }}</p>

                <p><strong>${{ number_format($product->price, 2) }}</strong></p>
                <p>Stock: {{ $product->stock }}</p>

                <!-- Action Buttons -->
                <div class="product-buttons">
    <form action="{{ route('cart.add', $product->id) }}" method="POST">
        @csrf
        <button type="submit">Add to Cart</button>
    </form>
    <a href="{{ route('cart.view') }}"><button>View Cart</button></a>
</div>

            </div>
        @endforeach
    </div>
</section>



    <!-- Pagination -->
    <div class="pagination-wrapper">
    {{ $products->links('vendor.pagination.simple-tailwind') }}
</div>
</section>

</body>
</html>
