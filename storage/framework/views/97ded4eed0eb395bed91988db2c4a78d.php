

<?php $__env->startSection('content'); ?>


<h2 class="mb-4">Form Pengajuan Banding UKT</h2>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="<?php echo e(route('pengajuan.store')); ?>"
              method="POST"
              enctype="multipart/form-data">

            <?php echo csrf_field(); ?>

            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="mb-3">
                <label class="form-label">Semester</label>
                <input type="text" name="semester" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">UKT Saat Ini</label>
                <input type="number" name="ukt_sekarang" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">UKT yang Diajukan</label>
                <input type="number" name="ukt_pengajuan" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Alasan Banding</label>
                <textarea name="alasan" class="form-control" rows="5" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Upload Bukti Pendukung</label>
                <input type="file" name="bukti" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
            </div>

            <button class="btn btn-success">
                Simpan Pengajuan
            </button>

            <a href="<?php echo e(route('pengajuan.index')); ?>" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Maulidina Aisha K\Documents\KULIAH\4. Semester 4\Analisis dan Desain Sistem 4B\App E-Banding UKT\resources\views/mahasiswa/pengajuan/create.blade.php ENDPATH**/ ?>