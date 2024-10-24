<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Beasiswa')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <!-- Tab Navigation -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('beasiswa/pilihan') ? 'active' : '' }}"
                    href="{{ route('beasiswa.pilihan') }}">Pilihan Beasiswa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('beasiswa') ? 'active' : '' }}"
                    href="{{ route('beasiswa.index') }}">Daftar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('beasiswa/hasil') ? 'active' : '' }}"
                    href="{{ route('beasiswa.hasil') }}">Hasil</a>
            </li>
        </ul>

        <!-- Content Area -->
        <div class="mt-3">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
