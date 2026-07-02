<div class="d-grid gap-2">

    <a href="{{ route('mahasiswa.dashboard') }}"
       class="menu-item {{ request()->routeIs('mahasiswa.dashboard') ? 'active-menu' : '' }}">

        <i class="bi bi-speedometer2 me-2"></i>
        Dashboard

    </a>

    <a href="{{ route('pengajuan.create') }}"
       class="menu-item {{ request()->routeIs('pengajuan.create') ? 'active-menu' : '' }}">

        <i class="bi bi-file-earmark-plus me-2"></i>
        Ajukan Banding

    </a>

    <a href="{{ route('pengajuan.index') }}"
       class="menu-item {{ request()->routeIs('pengajuan.index') ? 'active-menu' : '' }}">

        <i class="bi bi-clock-history me-2"></i>
        Riwayat

    </a>

    <a href="{{ route('profile.show') }}"
       class="menu-item {{ request()->routeIs('profile.*') ? 'active-menu' : '' }}">

        <i class="bi bi-person-circle me-2"></i>
        Profil

    </a>

</div>