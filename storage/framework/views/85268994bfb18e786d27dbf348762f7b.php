<?php $__env->startSection('content'); ?>

<h2 class="mb-4">
Dashboard Dekan
</h2>

<div class="welcome-banner mb-4" style="padding: 10px 0; border-bottom: 1px solid #e2e8f0;">
    <h5 style="color: #64748b; font-size: 0.9rem; font-weight: 500; margin-bottom: 4px; text-transform: uppercase; letter-spacing: 0.05em;">
        <span id="greeting">Selamat Datang</span>,
    </h5>
    <h2 style="color: #1e293b; font-size: 1.75rem; font-weight: 700; margin: 0; letter-spacing: -0.02em;">
        <?php echo e(auth()->user()->name); ?> 👋
    </h2>
</div>

<script>
    const hour = new Date().getHours();
    let greeting = "Selamat Malam";
    if (hour < 11) greeting = "Selamat Pagi";
    else if (hour < 15) greeting = "Selamat Siang";
    else if (hour < 19) greeting = "Selamat Sore";
    document.getElementById('greeting').innerText = greeting;
</script>

<div class="row g-3">

    <div class="col-md-4">
        <div class="stat-card blue">
            <div>
                <h6>Menunggu Verifikasi</h6>
                <h3><?php echo e($pendingFinal); ?></h3>
            </div>
            <i class="bi bi-clipboard-check stat-icon"></i>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card green">
            <div>
                <h6>Disetujui Dekan</h6>
                <h3><?php echo e($approvedFinal); ?></h3>
            </div>
            <i class="bi bi-check-circle-fill stat-icon"></i>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card red">
            <div>
                <h6>Ditolak</h6>
                <h3><?php echo e($rejected); ?></h3>
            </div>
            <i class="bi bi-x-circle stat-icon"></i>
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