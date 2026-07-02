<div class="list-group"> 
    
    <a href="{{ route('mahasiswa.dashboard') }}" 
    class="list-group-item list-group-item-action {{ 
request()->routeIs('mahasiswa.dashboard') ? 'active' : '' }}"> 
    Dashboard 
    </a> 
    
    <a href="{{ route('pengajuan.create') }}" 
    class="list-group-item list-group-item-action {{ 
request()->routeIs('pengajuan.create') ? 'active' : '' }}"> 
    Ajukan Banding 
    </a> 
    
    <a href="{{ route('pengajuan.index') }}" 
    class="list-group-item list-group-item-action {{ 
request()->routeIs('pengajuan.index') ? 'active' : '' }}">
     Riwayat Pengajuan 
    </a> 
    
    <a href="{{ route('profile.show') }}" 
    class="list-group-item list-group-item-action {{ 
request()->routeIs('profile.show') ? 'active' : '' }}"> 
    Profil 
    </a> 

</div>