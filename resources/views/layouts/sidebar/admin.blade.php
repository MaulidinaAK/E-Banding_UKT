<div class="list-group">

    <a href="{{ route('admin.dashboard') }}"
       class="list-group-item list-group-item-action {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        Dashboard
    </a>

    <a href="{{ route('admin.pengajuan.index') }}"
       class="list-group-item list-group-item-action {{ request()->routeIs('admin.pengajuan.*') ? 'active' : '' }}">
        Daftar Pengajuan
    </a>

    <a href="{{ route('profile.show') }}"
       class="list-group-item list-group-item-action {{ request()->routeIs('profile.show') ? 'active' : '' }}">
        Profil
    </a>

</div>