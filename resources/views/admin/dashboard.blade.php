<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="admin-dashboard">
        <div class="sidebar">
            <div class="sidebar-header">
                <h2>Admin Panel</h2>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <a href="{{ route('admin.index') }}">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('admin/users*') ? 'active' : '' }}">
                        <a href="{{ route('admin.users') }}">
                            <i class="fas fa-users"></i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('admin/complaints*') ? 'active' : '' }}">
                        <a href="{{ route('admin.complaints') }}">
                            <i class="fas fa-exclamation-circle"></i>
                            <span>Complaints</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('admin/audit-logs*') ? 'active' : '' }}">
                        <a href="{{ route('admin.audit-logs') }}">
                            <i class="fas fa-history"></i>
                            <span>Audit Logs</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="content-area">
            <div class="content-header">
                <h1>@yield('admin-title', 'Dashboard')</h1>
                <div class="user-actions">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>
            </div>

            <div class="content-body">
                @if (session('success'))
                    <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    </div>
                    <script>
                        // Auto-dismiss after 3 seconds
                        setTimeout(function() {
                            let alert = document.getElementById('success-alert');
                            if (alert) {
                                alert.classList.remove('show');
                                alert.classList.add('fade');
                            }
                        }, 3000);
                    </script>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @yield('admin-content')
            </div>
        </div>
    </div>

</body>

</html>
