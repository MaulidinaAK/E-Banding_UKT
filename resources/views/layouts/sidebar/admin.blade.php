<div class="list-group">

<a href="{{ route('admin.dashboard') }}"
class="list-group-item list-group-item-action {{
request()->routeIs('admin.dashboard') ? 'active' : '' }}">
Dashboard
</a>

<a href="{{ route('admin.pengajuan.index') }}"
class="list-group-item list-group-item-action {{
request()->routeIs('admin.pengajuan.index') ||
request()->routeIs('admin.pengajuan.show') ? 'active' : '' }}">
Kelola Pengajuan
</a>

<a href="{{ route('admin.riwayat') }}"
class="list-group-item list-group-item-action {{
request()->routeIs('admin.riwayat') ? 'active' : '' }}">
Riwayat
</a>

<a href="{{ route('profile.show') }}"
class="list-group-item list-group-item-action {{
request()->routeIs('profile.*') ? 'active' : '' }}">
Profil
</a>

</div>