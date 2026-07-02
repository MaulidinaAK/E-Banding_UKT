<div class="list-group"> 
    
    <a href="<?php echo e(route('mahasiswa.dashboard')); ?>" 
    class="list-group-item list-group-item-action <?php echo e(request()->routeIs('mahasiswa.dashboard') ? 'active' : ''); ?>"> 
    Dashboard 
    </a> 
    
    <a href="<?php echo e(route('pengajuan.create')); ?>" 
    class="list-group-item list-group-item-action <?php echo e(request()->routeIs('pengajuan.create') ? 'active' : ''); ?>"> 
    Ajukan Banding 
    </a> 
    
    <a href="<?php echo e(route('pengajuan.index')); ?>" 
    class="list-group-item list-group-item-action <?php echo e(request()->routeIs('pengajuan.index') ? 'active' : ''); ?>">
     Riwayat Pengajuan 
    </a> 
    
    <a href="<?php echo e(route('profile.show')); ?>" 
    class="list-group-item list-group-item-action <?php echo e(request()->routeIs('profile.show') ? 'active' : ''); ?>"> 
    Profil 
    </a> 

</div><?php /**PATH C:\Users\Maulidina Aisha K\Documents\KULIAH\4. Semester 4\Analisis dan Desain Sistem 4B\App E-Banding UKT\resources\views/layouts/sidebar/mahasiswa.blade.php ENDPATH**/ ?>