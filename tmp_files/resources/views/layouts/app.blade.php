<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CodeAge ERP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root { --brand: #b43232; }
        body { min-height: 100vh; }
        .sidebar { width: 260px; }
        .sidebar .nav-link.active, .btn-primary { background: var(--brand); border-color: var(--brand); }
        .brand { font-weight: 700; color: var(--brand); }
        .content { margin-left: 260px; }
        @media (max-width: 991px) { .content { margin-left: 0; } .sidebar { position: static; width: 100%; } }
    </style>
    @stack('head')
    @yield('head')
    @vite([])
    @stack('styles')
    @yield('styles')
    @stack('scripts-head')
</head>
<body class="bg-light">
<div class="d-flex">
    <nav class="sidebar bg-white border-end p-3 d-none d-lg-block">
        <div class="brand d-flex align-items-center mb-3">
            <div class="me-2 rounded-circle" style="background:var(--brand);width:32px;height:32px;"></div>
            <div>CodeAge Private Limited</div>
        </div>
        <div class="small text-muted mb-2">Menu</div>
        <ul class="nav nav-pills flex-column gap-1">
            <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="/employees">Employees</a></li>
            <li class="nav-item">
                <div class="small text-muted ms-2">Payroll</div>
                <ul class="nav flex-column ms-3">
                    <li class="nav-item"><a class="nav-link" href="/payroll/payslips">Payslips</a></li>
                    <li class="nav-item"><a class="nav-link" href="/payroll/security">Security</a></li>
                    <li class="nav-item"><a class="nav-link" href="/payroll/tax">Tax</a></li>
                </ul>
            </li>
            <li class="nav-item"><a class="nav-link" href="/users">User Management</a></li>
            <li class="nav-item"><a class="nav-link" href="/settings">Settings</a></li>
        </ul>
    </nav>

    <main class="content flex-fill">
        <header class="bg-white border-bottom py-2 px-3 d-flex justify-content-between align-items-center">
            <div class="d-lg-none">
                <a href="#" class="btn btn-outline-secondary btn-sm" onclick="document.querySelector('.sidebar').classList.toggle('d-none');return false;">Menu</a>
            </div>
            <div></div>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="me-2 text-end">
                        <div class="small fw-semibold">{{ auth()->user()->name ?? 'Guest' }}</div>
                        <div class="small text-muted">{{ auth()->user()->email ?? '' }}</div>
                    </div>
                    <span class="rounded-circle" style="background:#999;width:32px;height:32px;display:inline-block;"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    @auth
                    <li>
                        <form method="POST" action="/logout" class="px-3 py-1">
                            @csrf
                            <button type="submit" class="btn btn-link p-0">Logout</button>
                        </form>
                    </li>
                    @endauth
                    @guest
                    <li><a class="dropdown-item" href="/login">Login</a></li>
                    @endguest
                </ul>
            </div>
        </header>

        <div class="p-3">
            @yield('content')
        </div>
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
@yield('scripts')
</body>
</html>

