<div class="list-group"> 
    
    <a href="<?php echo e(route('kaprodi.dashboard')); ?>" 
    class="list-group-item list-group-item-action <?php echo e(request()->routeIs('kaprodi.dashboard') ? 'active' : ''); ?>">
     Dashboard
    
    </a>


    <a href="<?php echo e(route('kaprodi.pengajuan.index')); ?>" 
    class="list-group-item list-group-item-action <?php echo e(request()->routeIs('kaprodi.pengajuan.*') ? 'active' : ''); ?>"> 
    Verifikasi Pengajuan 
    </a> 
    
    <a href="<?php echo e(route('kaprodi.riwayat')); ?>" 
    class="list-group-item list-group-item-action <?php echo e(request()->routeIs('kaprodi.riwayat') ? 'active' : ''); ?>">
     Riwayat Verifikasi 
    </a> 
    
    <a href="<?php echo e(route('profile.show')); ?>" 
    class="list-group-item list-group-item-action <?php echo e(request()->routeIs('profile.show') ? 'active' : ''); ?>"> 
    Profil 
    </a>

</div>
<?php /**PATH C:\Users\Maulidina Aisha K\Documents\KULIAH\4. Semester 4\Analisis dan Desain Sistem 4B\App E-Banding UKT\resources\views/layouts/sidebar/kaprodi.blade.php ENDPATH**/ ?>