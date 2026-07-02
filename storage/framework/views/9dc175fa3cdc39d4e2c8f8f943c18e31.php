<div class="d-grid gap-2">

    <a href="<?php echo e(route('mahasiswa.dashboard')); ?>"
       class="menu-item <?php echo e(request()->routeIs('mahasiswa.dashboard') ? 'active-menu' : ''); ?>">

        <i class="bi bi-speedometer2 me-2"></i>
        Dashboard

    </a>

    <a href="<?php echo e(route('pengajuan.create')); ?>"
       class="menu-item <?php echo e(request()->routeIs('pengajuan.create') ? 'active-menu' : ''); ?>">

        <i class="bi bi-file-earmark-plus me-2"></i>
        Ajukan Banding

    </a>

    <a href="<?php echo e(route('pengajuan.index')); ?>"
       class="menu-item <?php echo e(request()->routeIs('pengajuan.index') ? 'active-menu' : ''); ?>">

        <i class="bi bi-clock-history me-2"></i>
        Riwayat

    </a>

    <a href="<?php echo e(route('profile.show')); ?>"
       class="menu-item <?php echo e(request()->routeIs('profile.*') ? 'active-menu' : ''); ?>">

        <i class="bi bi-person-circle me-2"></i>
        Profil

    </a>

</div><?php /**PATH C:\Users\Maulidina Aisha K\Documents\KULIAH\4. Semester 4\Analisis dan Desain Sistem 4B\App E-Banding UKT\resources\views/layouts/sidebar/mahasiswa.blade.php ENDPATH**/ ?>