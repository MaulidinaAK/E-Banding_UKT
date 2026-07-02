<div class="list-group"> 
    
    <a href="{{ route('kaprodi.dashboard') }}" 
    class="list-group-item list-group-item-action {{ 
request()->routeIs('kaprodi.dashboard') ? 'active' : '' }}">
     Dashboard
    
    </a>


    <a href="{{ route('kaprodi.pengajuan.index') }}" 
    class="list-group-item list-group-item-action {{ 
request()->routeIs('kaprodi.pengajuan.*') ? 'active' : '' }}"> 
    Verifikasi Pengajuan 
    </a> 
    
    <a href="{{ route('kaprodi.riwayat') }}" 
    class="list-group-item list-group-item-action {{ 
request()->routeIs('kaprodi.riwayat') ? 'active' : '' }}">
     Riwayat Verifikasi 
    </a> 
    
    <a href="{{ route('profile.show') }}" 
    class="list-group-item list-group-item-action {{ 
request()->routeIs('profile.show') ? 'active' : '' }}"> 
    Profil 
    </a>

</div>
