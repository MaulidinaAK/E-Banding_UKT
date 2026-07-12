<?php $__env->startSection('sidebar'); ?>

<div class="sidebar-menu">

    <a href="<?php echo e(route('mahasiswa.dashboard')); ?>"
       class="menu-item <?php echo e(request()->routeIs('mahasiswa.dashboard') ? 'active' : ''); ?>">
        <i class="bi bi-speedometer2"></i>
        Dashboard
    </a>

    <a href="<?php echo e(route('pengajuan.create')); ?>"
       class="menu-item <?php echo e(request()->routeIs('pengajuan.create') ? 'active' : ''); ?>">
        <i class="bi bi-file-earmark-plus"></i>
        Ajukan Banding
    </a>

    <a href="<?php echo e(route('pengajuan.index')); ?>"
       class="menu-item <?php echo e(request()->routeIs('pengajuan.index') ? 'active' : ''); ?>">
        <i class="bi bi-clock-history"></i>
        Riwayat Pengajuan
    </a>

    <a href="<?php echo e(route('profile.show')); ?>"
       class="menu-item <?php echo e(request()->routeIs('profile.show') ? 'active' : ''); ?>">
        <i class="bi bi-person-circle"></i>
        Profil
    </a>

</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<h2 class="mb-4">
    Dashboard Mahasiswa
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
                <h6>Total Pengajuan</h6>
                <h3><?php echo e($totalPengajuan); ?></h3>
            </div>
            <i class="bi bi-file-earmark-text stat-icon"></i>
        </div>
    </div>

   <div class="col-md-4">
    <div class="stat-card card-pending">

        <div>

            <h6>Status Terakhir</h6>

            <h3>

                <?php if($pengajuanTerakhir): ?>

                    <?php switch($pengajuanTerakhir->status):

                        case ('Pending TU'): ?>
                            Verifikasi TU
                            <?php break; ?>

                        <?php case ('Pending Kaprodi'): ?>
                            Verifikasi Kaprodi
                            <?php break; ?>

                        <?php case ('Pending Dekan'): ?>
                            Verifikasi Dekan
                            <?php break; ?>

                        <?php default: ?>
                            <?php echo e($pengajuanTerakhir->status); ?>


                    <?php endswitch; ?>

                <?php else: ?>

                    Belum Ada Pengajuan

                <?php endif; ?>

            </h3>

        </div>

        <i class="bi bi-hourglass-split stat-icon"></i>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Maulidina Aisha K\Documents\KULIAH\4. Semester 4\Analisis dan Desain Sistem 4B\App E-Banding UKT\resources\views/dashboard/mahasiswa.blade.php ENDPATH**/ ?>