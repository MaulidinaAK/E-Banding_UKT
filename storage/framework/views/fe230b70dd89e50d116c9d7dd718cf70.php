<div class="list-group">

<a href="<?php echo e(route('admin.dashboard')); ?>"
class="list-group-item list-group-item-action <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
Dashboard
</a>

<a href="<?php echo e(route('admin.pengajuan.index')); ?>"
class="list-group-item list-group-item-action <?php echo e(request()->routeIs('admin.pengajuan.index') ||
request()->routeIs('admin.pengajuan.show') ? 'active' : ''); ?>">
Kelola Pengajuan
</a>

<a href="<?php echo e(route('admin.riwayat')); ?>"
class="list-group-item list-group-item-action <?php echo e(request()->routeIs('admin.riwayat') ? 'active' : ''); ?>">
Riwayat
</a>

<a href="<?php echo e(route('profile.show')); ?>"
class="list-group-item list-group-item-action <?php echo e(request()->routeIs('profile.*') ? 'active' : ''); ?>">
Profil
</a>

</div><?php /**PATH C:\Users\Maulidina Aisha K\Documents\KULIAH\4. Semester 4\Analisis dan Desain Sistem 4B\App E-Banding UKT\resources\views/layouts/sidebar/admin.blade.php ENDPATH**/ ?>