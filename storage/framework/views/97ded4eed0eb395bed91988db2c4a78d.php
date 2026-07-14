<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2 class="mb-0">Form Pengajuan Banding UKT</h2>

    <a href="<?php echo e(route('mahasiswa.dashboard')); ?>"
       class="btn btn-sm btn-outline-primary">

        <i class="bi bi-arrow-left"></i>
        Dashboard

    </a>

</div>


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

            <hr class="my-4">

<h5 class="fw-bold mb-3">
    <i class="bi bi-folder2-open text-primary"></i>
    Dokumen Persyaratan
</h5>

<p class="text-muted mb-4">
    Seluruh dokumen di bawah ini wajib diunggah sebagai persyaratan pengajuan banding UKT.
</p>

<div class="alert border-0 shadow-sm mb-4"
style="
background:#EFF6FF;
border-left:5px solid #2563EB !important;
border-radius:14px;
">

<h6 class="fw-bold mb-2">
    <i class="bi bi-info-circle-fill text-primary"></i>
    Informasi
</h6>

<p class="mb-0 text-muted">
    Seluruh dokumen di bawah bersifat <strong>wajib</strong>. Pastikan file dapat dibaca dengan jelas dan berformat PDF/JPG/PNG dengan ukuran maksimal 2 MB per file.
</p>

</div>

<div class="row">

    <div class="col-md-6 mb-3">
        <label class="form-label">Kartu Tanda Mahasiswa (KTM)</label>
        <small class="text-muted d-block mb-2">
    Upload scan atau foto KTM yang masih berlaku.
</small>
        <input type="file" name="ktm" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Kartu Keluarga</label>
        <input type="file" name="kartu_keluarga" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Slip Gaji Orang Tua</label>
        <small class="text-muted d-block mb-2">
    Jika tidak memiliki slip gaji, dapat diganti surat keterangan penghasilan.
</small>
        <input type="file" name="slip_gaji" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Surat Pernyataan Tidak Menerima Beasiswa</label>
        <input type="file" name="surat_tidak_beasiswa" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Tagihan Listrik / Air</label>
        <small class="text-muted d-block mb-2">
    Upload tagihan listrik selama 3 bulan terakhir
</small>
        <input type="file" name="tagihan_listrik_air" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Dokumen Jumlah Tanggungan Keluarga</label>
        <input type="file" name="dokumen_tanggungan" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Foto Kondisi Rumah</label>
        <small class="text-muted d-block mb-2">
    Foto tampak depan atau kondisi tempat tinggal saat ini.
</small>
        <input type="file" name="foto_rumah" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Surat Pendukung Lainnya</label>
        <small class="text-muted d-block mb-2">
    Dokumen tambahan yang dapat memperkuat alasan pengajuan banding UKT.
</small>
        <input type="file" name="surat_pendukung" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
    </div>

</div>

            <button class="btn btn-success">
                Simpan Pengajuan
            </button>

        </form>

    </div>
    
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Maulidina Aisha K\Documents\KULIAH\4. Semester 4\Analisis dan Desain Sistem 4B\App E-Banding UKT\resources\views/mahasiswa/pengajuan/create.blade.php ENDPATH**/ ?>