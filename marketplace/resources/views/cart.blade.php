{{-- <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Cart</title>
<style>
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
    th { background: #333; color: #fff; }
    button { padding: 5px 10px; border:none; background:#2196f3; color:#fff; border-radius:4px; cursor:pointer; }
</style>
</head>
<body>
    <h1>My Cart</h1>
    @if(session('success'))
        <div style="background:#4caf50; color:#fff; padding:10px;">{{ session('success') }}</div>
    @endif

    @if(count($cart) > 0)
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php $grandTotal = 0; @endphp
                @foreach($cart as $id => $item)
                    @php $total = $item['price'] * $item['quantity']; $grandTotal += $total; @endphp
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>${{ number_format($item['price'], 2) }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>${{ number_format($total, 2) }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3"><strong>Grand Total</strong></td>
                    <td><strong>${{ number_format($grandTotal, 2) }}</strong></td>
                </tr>
            </tbody>
        </table>
    @else
        <p>Your cart is empty.</p>
    @endif

    <a href="{{ url('/') }}"><button>Continue Shopping</button></a>
</body>
</html> --}}


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Cart</title>
<style>
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
    th { background: #333; color: #fff; }
    button { padding: 8px 12px; border:none; background:#2196f3; color:#fff; border-radius:4px; cursor:pointer; margin-top:10px; }
    button:hover { background:#1976d2; }
    .checkout-btn { float:right; }
</style>
</head>
<body>
    <h1>My Cart</h1>
    @if(session('success'))
        <div style="background:#4caf50; color:#fff; padding:10px;">{{ session('success') }}</div>
    @endif

    @if(count($cart) > 0)
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php $grandTotal = 0; @endphp
                @foreach($cart as $id => $item)
                    @php $total = $item['price'] * $item['quantity']; $grandTotal += $total; @endphp
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>${{ number_format($item['price'], 2) }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>${{ number_format($total, 2) }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3"><strong>Grand Total</strong></td>
                    <td><strong>${{ number_format($grandTotal, 2) }}</strong></td>
                </tr>
            </tbody>
        </table>

        <!-- Proceed to Checkout -->
        <a href="#"><button class="checkout-btn">Proceed to Checkout</button></a>

    @else
        <p>Your cart is empty.</p>
    @endif

    <a href="{{ url('/') }}"><button>Continue Shopping</button></a>
</body>
</html>
