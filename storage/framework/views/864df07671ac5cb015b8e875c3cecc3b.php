<div class="list-group">

    <a href="<?php echo e(route('dekan.dashboard')); ?>"
       class="list-group-item list-group-item-action <?php echo e(request()->routeIs('dekan.dashboard') ? 'active' : ''); ?>">
        Dashboard
    </a>

    <a href="<?php echo e(route('dekan.pengajuan.index')); ?>"
       class="list-group-item list-group-item-action <?php echo e(request()->routeIs('dekan.pengajuan.*') ? 'active' : ''); ?>">
        Kelola Pengajuan
    </a>

    <a href="<?php echo e(route('dekan.riwayat')); ?>"
       class="list-group-item list-group-item-action <?php echo e(request()->routeIs('dekan.riwayat') ? 'active' : ''); ?>">
        Riwayat
    </a>

    <a href="<?php echo e(route('profile.show')); ?>"
       class="list-group-item list-group-item-action <?php echo e(request()->routeIs('profile.*') ? 'active' : ''); ?>">
        Profil
    </a>

</div><?php /**PATH C:\Users\Maulidina Aisha K\Documents\KULIAH\4. Semester 4\Analisis dan Desain Sistem 4B\App E-Banding UKT\resources\views/layouts/sidebar/dekan.blade.php ENDPATH**/ ?>