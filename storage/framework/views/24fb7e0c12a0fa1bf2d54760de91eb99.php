<?php $__env->startSection('content'); ?>

<h2 class="mb-4">Detail Pengajuan Banding UKT</h2>


<div class="card shadow-sm mb-4">

    <div class="card-header bg-primary text-white">
        Informasi Pengajuan
    </div>

    <div class="card-body">

        <table class="table table-detail mb-0">

            <tr>
                <th width="250">Nama Mahasiswa</th>
                <td><?php echo e($pengajuan->user->name); ?></td>
            </tr>

            <tr>
                <th>Semester</th>
                <td><?php echo e($pengajuan->semester); ?></td>
            </tr>

            <tr>
                <th>Tanggal Pengajuan</th>
                <td>
                    <?php echo e($pengajuan->created_at->format('d F Y')); ?>

                    pukul
                    <?php echo e($pengajuan->created_at->format('H:i')); ?> WIB
                </td>
            </tr>

            <tr>
                <th>UKT Saat Ini</th>
                <td>
                    Rp <?php echo e(number_format($pengajuan->ukt_sekarang,0,',','.')); ?>

                </td>
            </tr>

            <tr>
                <th>UKT Diajukan</th>
                <td>
                    Rp <?php echo e(number_format($pengajuan->ukt_pengajuan,0,',','.')); ?>

                </td>
            </tr>

            <tr>
                <th>Status</th>
                <td>

                    <?php switch($pengajuan->status):

                        case ('Pending Kaprodi'): ?>
                            <span class="badge bg-warning text-dark">
                                Menunggu Verifikasi Kaprodi
                            </span>
                            <?php break; ?>

                        <?php case ('Pending Dekan'): ?>
                            <span class="badge bg-info">
                                Menunggu Verifikasi Dekan
                            </span>
                            <?php break; ?>

                        <?php case ('Revisi'): ?>
                            <span class="badge bg-secondary">
                                Revisi
                            </span>
                            <?php break; ?>

                        <?php case ('Ditolak'): ?>
                            <span class="badge bg-danger">
                                Ditolak
                            </span>
                            <?php break; ?>

                        <?php case ('Disetujui'): ?>
                            <span class="badge bg-success">
                                Disetujui
                            </span>
                            <?php break; ?>

                    <?php endswitch; ?>

                </td>
            </tr>

        </table>

    </div>

</div>



<div class="card shadow-sm mb-4">

    <div class="card-header bg-primary text-white">
        Alasan Pengajuan
    </div>

    <div class="card-body">

        <?php echo e($pengajuan->alasan); ?>


    </div>

</div>



<div class="card shadow-sm mb-4">

    <div class="card-header bg-primary text-white">
        Dokumen Pendukung
    </div>

    <div class="card-body">

        <?php
            $dokumen = [
                'Kartu Tanda Mahasiswa (KTM)' => $pengajuan->ktm,
                'Kartu Keluarga' => $pengajuan->kartu_keluarga,
                'Slip Gaji Orang Tua' => $pengajuan->slip_gaji,
                'Surat Tidak Menerima Beasiswa' => $pengajuan->surat_tidak_beasiswa,
                'Tagihan Listrik / Air' => $pengajuan->tagihan_listrik_air,
                'Dokumen Jumlah Tanggungan' => $pengajuan->dokumen_tanggungan,
                'Foto Rumah' => $pengajuan->foto_rumah,
                'Surat Pendukung Lainnya' => $pengajuan->surat_pendukung,
            ];
        ?>

        <div class="row g-3">

            <?php $__currentLoopData = $dokumen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nama => $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="col-md-6">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body d-flex justify-content-between align-items-center">

                            <div>

                                <h6 class="fw-semibold mb-1">
                                    <i class="bi bi-file-earmark-text text-primary me-2"></i>
                                    <?php echo e($nama); ?>

                                </h6>

                                <?php if($file): ?>

                                    <small class="text-success">
                                        <i class="bi bi-check-circle-fill"></i>
                                        Dokumen tersedia
                                    </small>

                                <?php else: ?>

                                    <small class="text-danger">
                                        <i class="bi bi-x-circle-fill"></i>
                                        Belum diunggah
                                    </small>

                                <?php endif; ?>

                            </div>

                            <?php if($file): ?>

                                <div class="d-flex gap-2">

                                    <a href="<?php echo e(asset('storage/'.$file)); ?>"
                                       target="_blank"
                                       class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <a href="<?php echo e(asset('storage/'.$file)); ?>"
                                       download
                                       class="btn btn-outline-success btn-sm">
                                        <i class="bi bi-download"></i>
                                    </a>

                                </div>

                            <?php endif; ?>

                        </div>

                    </div>

                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

    </div>

</div>



<div class="card shadow-sm">

    <div class="card-header bg-primary text-white">
        Verifikasi Pengajuan
    </div>

    <div class="card-body text-center">

        <?php if($pengajuan->status == 'Pending Kaprodi'): ?>

            
            <form action="<?php echo e(route('kaprodi.pengajuan.updateStatus',$pengajuan)); ?>"
                  method="POST"
                  class="d-inline">

                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>

                <input type="hidden" name="status" value="Pending Dekan">

                <button class="btn btn-success me-2">
                    <i class="bi bi-check-circle"></i>
                    Setujui
                </button>

            </form>

            
            <button class="btn btn-warning me-2"
                    data-bs-toggle="modal"
                    data-bs-target="#modalRevisi">

                <i class="bi bi-arrow-repeat"></i>
                Revisi

            </button>

            
            <button class="btn btn-danger"
                    data-bs-toggle="modal"
                    data-bs-target="#modalTolak">

                <i class="bi bi-x-circle"></i>
                Tolak

            </button>

        <?php else: ?>

            <div class="alert alert-info mb-0">

                Pengajuan ini sudah diproses.

            </div>

        <?php endif; ?>

        <hr>

        <a href="<?php echo e(route('kaprodi.pengajuan.index')); ?>"
           class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>
            Kembali

        </a>

    </div>

</div>




<div class="modal fade" id="modalRevisi" tabindex="-1">

    <div class="modal-dialog">

        <form action="<?php echo e(route('kaprodi.pengajuan.updateStatus',$pengajuan)); ?>"
              method="POST"
              class="modal-content">

            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>

            <input type="hidden" name="status" value="Revisi">

            <div class="modal-header">

                <h5 class="modal-title">
                    Revisi Pengajuan
                </h5>

                <button class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <textarea
                    name="catatan"
                    class="form-control"
                    rows="5"
                    placeholder="Tuliskan alasan revisi..."
                    required></textarea>

            </div>

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">

                    Batal

                </button>

                <button class="btn btn-warning">

                    Kirim Revisi

                </button>

            </div>

        </form>

    </div>

</div>




<div class="modal fade" id="modalTolak" tabindex="-1">

    <div class="modal-dialog">

        <form action="<?php echo e(route('kaprodi.pengajuan.updateStatus',$pengajuan)); ?>"
              method="POST"
              class="modal-content">

            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>

            <input type="hidden" name="status" value="Ditolak">

            <div class="modal-header">

                <h5 class="modal-title">
                    Tolak Pengajuan
                </h5>

                <button class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <textarea
                    name="catatan"
                    class="form-control"
                    rows="5"
                    placeholder="Tuliskan alasan penolakan..."
                    required></textarea>

            </div>

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">

                    Batal

                </button>

                <button class="btn btn-danger">

                    Tolak

                </button>

            </div>

        </form>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Maulidina Aisha K\Documents\KULIAH\4. Semester 4\Analisis dan Desain Sistem 4B\App E-Banding UKT\resources\views/kaprodi/pengajuan/show.blade.php ENDPATH**/ ?>