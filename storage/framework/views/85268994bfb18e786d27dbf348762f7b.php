

<?php $__env->startSection('content'); ?>

<h2 class="mb-4">
Dashboard Dekan
</h2>

<div class="alert alert-success">
Selamat datang,
<b><?php echo e(auth()->user()->name); ?></b>
</div>

<div class="row">

<div class="col-md-3">
<div class="card shadow">
<div class="card-body text-center">
<h5>Total Pengajuan</h5>
<h2><?php echo e($totalPengajuan); ?></h2>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card shadow">
<div class="card-body text-center">
<h5>Menunggu Verifikasi</h5>
<h2><?php echo e($pendingDekan); ?></h2>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card shadow">
<div class="card-body text-center">
<h5>Disetujui</h5>
<h2><?php echo e($disetujui); ?></h2>
</div>
</div>
</div>


<div class="col-md-3">
<div class="card shadow">
<div class="card-body text-center">
<h5>Revisi/Ditolak</h5>
<h2><?php echo e($ditolak); ?></h2>
</div>
</div>
</div>

</div>

<div class="mt-4">

<a href="<?php echo e(route('dekan.pengajuan.index')); ?>"
class="btn btn-primary">

Kelola Pengajuan

</a>

<a href="<?php echo e(route('dekan.riwayat')); ?>"
class="btn btn-success">

Riwayat

</a>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Maulidina Aisha K\Documents\KULIAH\4. Semester 4\Analisis dan Desain Sistem 4B\App E-Banding UKT\resources\views/dashboard/dekan.blade.php ENDPATH**/ ?>