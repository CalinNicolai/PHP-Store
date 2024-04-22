<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/admin/dashboard">Admin Panel</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/adminproducts/">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/adminusers/">Users</a>
            </li>
        </ul>
    </div>
</nav>

@yield('content')
</body>
</html>
