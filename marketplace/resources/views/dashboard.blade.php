{{-- <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Welcome, {{ $user->name }}!</h1>
<p>Your role: {{ $user->role }}</p>
<a href="{{ route('logout') }}">Logout</a>

</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - MyShop</title>
    <style>
        body { font-family: Arial, sans-serif; margin:0; padding:0; background:#f4f4f4; }
        header { background:#333; color:#fff; padding:15px 30px; display:flex; justify-content:space-between; align-items:center; }
        header a { color:#fff; text-decoration:none; margin-left:15px; }
        main { padding:20px; }
        h1 { margin-bottom:20px; }
        .links a { display:inline-block; margin:5px 10px; padding:8px 12px; background:#2196f3; color:#fff; border-radius:4px; text-decoration:none; }
        .links a:hover { background:#1976d2; }

        table { width:100%; border-collapse:collapse; margin-top:20px; background:#fff; }
        th, td { padding:12px; border:1px solid #ddd; text-align:left; }
        th { background:#333; color:#fff; }
        select { padding:5px; }
        button { padding:5px 10px; border:none; background:#2196f3; color:#fff; border-radius:4px; cursor:pointer; }
        button:hover { background:#1976d2; }
    </style>
</head>
<body>

<header>
    <div>
        <strong>MyShop Dashboard</strong>
    </div>
    <div>
        Welcome, {{ $user->name }} ({{ $user->role }})
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</header>

<main>
    <h1>Dashboard</h1>

    @if($user->role === 'admin')
        <h2>All Users</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allUsers as $u)
                <tr>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->role }}</td>
                    <td>
                        {{-- <form action="{{ route('admin.updateRole', $u->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="role">
                                <option value="user" {{ $u->role=='user'?'selected':'' }}>User</option>
                                <option value="vendor" {{ $u->role=='vendor'?'selected':'' }}>Vendor</option>
                                <option value="admin" {{ $u->role=='admin'?'selected':'' }}>Admin</option>
                            </select>
                            <button type="submit">Update</button>
                        </form> --}}

                        <form action="{{ route('admin.updateRole') }}" method="POST">
    @csrf
    <input type="hidden" name="user_id" value="{{ $u->id }}">
    <select name="role">
        <option value="user" {{ $u->role === 'user' ? 'selected' : '' }}>User</option>
        <option value="vendor" {{ $u->role === 'vendor' ? 'selected' : '' }}>Vendor</option>
        <option value="admin" {{ $u->role === 'admin' ? 'selected' : '' }}>Admin</option>
    </select>
    <button type="submit">Update Role</button>
</form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @elseif($user->role === 'vendor')
        
        <div class="links">
            <a href="{{ route('products.create') }}">Add Product</a>
            <a href="{{ route('vendor.products') }}">My Products</a>
        </div>
    @endif
</main>

</body>
</html>
