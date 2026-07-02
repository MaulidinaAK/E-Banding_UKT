<div class="list-group">

    <a href="{{ route('dekan.dashboard') }}"
       class="list-group-item list-group-item-action {{ request()->routeIs('dekan.dashboard') ? 'active' : '' }}">
        Dashboard
    </a>

    <a href="{{ route('dekan.pengajuan.index') }}"
       class="list-group-item list-group-item-action {{ request()->routeIs('dekan.pengajuan.*') ? 'active' : '' }}">
        Kelola Pengajuan
    </a>

    <a href="{{ route('dekan.riwayat') }}"
       class="list-group-item list-group-item-action {{ request()->routeIs('dekan.riwayat') ? 'active' : '' }}">
        Riwayat
    </a>

    <a href="{{ route('profile.edit') }}"
       class="list-group-item list-group-item-action {{ request()->routeIs('profile.*') ? 'active' : '' }}">
        Profil
    </a>

</div>