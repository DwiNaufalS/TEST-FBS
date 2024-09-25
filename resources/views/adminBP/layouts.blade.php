<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert/css/sweetalert.css') }}">
    <title>@yield('title')</title>
    <style>
        .sidebar {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .sidebar a {
            padding: 10px 15px; 
            display: flex; 
            align-items: center;
            text-decoration: none;
            color: white;
            margin-bottom: 10px;
            border-bottom: 2px solid rgba(255, 255, 255, 0.5);
        }
        .sidebar a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        .logout-button {
            margin-top: auto;
            margin-bottom: 20px;
        }
        .menu-title {
            text-align: center;
        }
        .menu-list {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <div class="sidebar bg-primary text-white p-4">
            <h4 class="menu-title">Menu</h4>
            <ul class="list-unstyled menu-list">
                <li>
                    <a href="{{ route('adminBP.dashboard') }}">
                        <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('adminBP.callNextQueue', ['jenisAntrian' => 'BP']) }}">
                        <i class="fas fa-bell me-2"></i> Panggil Antrian
                    </a>
                </li>
                <li>
                    <a href="{{ route('adminBP.showReport') }}">
                        <i class="fas fa-chart-line me-2"></i> Laporan Pemanggilan
                    </a>
                </li>
            </ul>
            <div class="text-center logout-button">
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                    </button>
                </form>
            </div>
        </div>
        <div class="flex-grow-1 p-4">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('vendor/sweetalert/js/sweetalert.min.js') }}"></script>
    @include('sweetalert::alert')
</body>
</html>
