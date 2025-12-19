<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Admin Panel') - La Fortuna</title>
    @vite(['resources/css/app.css'])
    @livewireStyles
    <style>
        .admin-layout { display: grid; grid-template-columns: 260px 1fr; min-height: 100vh; background: var(--off-white); }
        .admin-sidebar { background: var(--white); border-right: 1px solid var(--light-gray); position: sticky; top: 0; height: 100vh; }
        .admin-brand { display: flex; align-items: center; gap: 10px; padding: 18px 16px; font-weight: 700; color: var(--dark); border-bottom: 1px solid var(--light-gray); }
        .admin-brand .dot { width: 10px; height: 10px; border-radius: 999px; background: var(--gold); }
        .admin-nav { padding: 12px; display: flex; flex-direction: column; gap: 6px; }
        .admin-nav a { display: flex; align-items: center; gap: 10px; padding: 10px 12px; border-radius: 8px; color: var(--dark); }
        .admin-nav a:hover { background: var(--light-gray); }
        .admin-nav a.active { background: oklch(0.95 0.03 85); color: var(--dark); border: 1px solid oklch(0.85 0.08 85); }
        .admin-topbar { display: flex; align-items: center; justify-content: space-between; background: var(--white); border-bottom: 1px solid var(--light-gray); padding: 12px 16px; position: sticky; top: 0; z-index: 10; }
        .admin-actions { display: flex; align-items: center; gap: 12px; }
        .user-menu { position: relative; }
        .user-menu-btn { display: flex; align-items: center; gap: 10px; padding: 8px 12px; border-radius: 999px; background: var(--light-gray); }
        .user-menu-panel { position: absolute; right: 0; margin-top: 8px; background: var(--white); border: 1px solid var(--light-gray); border-radius: 10px; box-shadow: 0 8px 24px var(--shadow); min-width: 220px; display: none; }
        .user-menu.open .user-menu-panel { display: block; }
        .user-menu-panel a { display: block; padding: 10px 12px; color: var(--dark); }
        .user-menu-panel a:hover { background: var(--light-gray); }
        .admin-main { padding: 16px; }
        .admin-page-title { font-size: 20px; font-weight: 700; }
        .badge { background: linear-gradient(135deg, var(--gold), var(--gold-dark)); color: var(--white); padding: 2px 8px; border-radius: 999px; font-size: 12px; font-weight: 600; }
    </style>
    @stack('styles')
</head>
<body>
<div class="admin-layout">
    <aside class="admin-sidebar">
        <div class="admin-brand">
            <span class="dot"></span>
            <span>La Fortuna Admin</span>
        </div>
        <nav class="admin-nav">
            <a href="{{ route('admin.leads.index') }}" class="{{ request()->routeIs('admin.leads.*') ? 'active' : '' }}">
                <i class="fa-solid fa-inbox"></i>
                <span>Leads</span>
                <span class="badge" style="margin-left:auto;">New</span>
            </a>
            <a href="{{ route('admin.galleries.index') }}" class="{{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
                <i class="fa-regular fa-image"></i>
                <span>Galleries</span>
            </a>
        </nav>
    </aside>
    <section>
        <header class="admin-topbar">
            <div class="admin-page-title">@yield('page_title', 'Dashboard')</div>
            <div class="admin-actions">
                <div class="user-menu" id="userMenu">
                    <button class="user-menu-btn" id="userMenuBtn">
                        <span style="width:28px;height:28px;border-radius:999px;background:var(--gold);display:inline-block;"></span>
                        <span>{{ auth('admin')->user()->name ?? auth('admin')->user()->email ?? 'Admin' }}</span>
                        <i class="fa-solid fa-chevron-down" style="font-size:12px;color:var(--gray);"></i>
                    </button>
                    <div class="user-menu-panel">
                        <a href="{{ route('admin.password.edit') }}"><i class="fa-solid fa-key"></i> Change Password</a>
                        <a href="{{ route('admin.logout') }}"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                    </div>
                </div>
            </div>
        </header>
        <main class="admin-main">
            @yield('content')
        </main>
    </section>
</div>

<script>
    const userMenu = document.getElementById('userMenu');
    const userMenuBtn = document.getElementById('userMenuBtn');
    if (userMenuBtn) {
        userMenuBtn.addEventListener('click', function () {
            userMenu.classList.toggle('open');
        });
        document.addEventListener('click', function(e){
            if (!userMenu.contains(e.target)) { userMenu.classList.remove('open'); }
        });
    }
</script>
@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stack('scripts')
</body>
</html>
