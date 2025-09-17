<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyShop</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background: #f4f4f4; }
        header { background: #333; color: #fff; padding: 15px; text-align: center; }
        a { color: #2196f3; text-decoration: none; }
        a:hover { text-decoration: underline; }
        .products-grid { display: flex; flex-wrap: wrap; gap: 20px; }
        .product-card { background: #fff; padding: 15px; border-radius: 5px; width: 200px; text-align: center; }
        .pagination-wrapper { margin-top: 20px; }
    </style>
</head>
<body>
    <header>
        <h1>MyShop Dashboard</h1>
        <nav>
            <a href="{{ route('dashboard') }}">Dashboard</a> |
            <a href="{{ route('products.index') }}">Home</a> |
            <a href="{{ route('vendor.products') }}">My Products</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>
