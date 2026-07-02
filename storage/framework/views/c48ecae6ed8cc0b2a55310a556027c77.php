<?php $__env->startSection('content'); ?>

<h2 class="mb-4">Edit Profil</h2>

<?php if(session('success')): ?>
<div class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<?php if($errors->any()): ?>
<div class="alert alert-danger">
    <ul class="mb-0">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>

<div class="card shadow-sm">
    <div class="card-body">

        <form method="POST"
              action="<?php echo e(route('profile.update')); ?>"
              enctype="multipart/form-data">

            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>

            <div class="text-center mb-4">

                <img src="<?php echo e($user->photo_url); ?>"
                     class="rounded-circle border shadow"
                     width="160"
                     height="160"
                     style="object-fit:cover;">

                <h4 class="mt-3">
                    <?php echo e($user->name); ?>

                </h4>

                <small class="text-muted">
                    <?php echo e($user->role->name); ?>

                </small>

            </div>

            

            <div class="mb-4">
                <label class="form-label">
                    Foto Profil
                </label>

                <input
                    type="file"
                    name="photo"
                    class="form-control">

                <small class="text-muted">
                    Format JPG / PNG maksimal 2 MB
                </small>
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Nama
                </label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="<?php echo e(old('name',$user->name)); ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="<?php echo e(old('email',$user->email)); ?>">
            </div>

            <?php if($user->role->name == 'Mahasiswa'): ?>

                <div class="mb-3">
                    <label class="form-label">
                        NIM
                    </label>

                    <input
                        type="text"
                        name="nim"
                        class="form-control"
                        value="<?php echo e(old('nim',$user->nim)); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Program Studi
                    </label>

                    <input
                        type="text"
                        name="prodi"
                        class="form-control"
                        value="<?php echo e(old('prodi',$user->prodi)); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Fakultas
                    </label>

                    <input
                        type="text"
                        name="fakultas"
                        class="form-control"
                        value="<?php echo e(old('fakultas',$user->fakultas)); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Semester
                    </label>

                    <input
                        type="text"
                        name="semester"
                        class="form-control"
                        value="<?php echo e(old('semester',$user->semester)); ?>">
                </div>

            <?php endif; ?>

            <?php if($user->role->name != 'Mahasiswa'): ?>

                <div class="mb-3">
                    <label class="form-label">
                        NIP
                    </label>

                    <input
                        type="text"
                        name="nip"
                        class="form-control"
                        value="<?php echo e(old('nip',$user->nip)); ?>">
                </div>

            <?php endif; ?>

            <?php if($user->role->name == 'Kaprodi'): ?>

                <div class="mb-3">
                    <label class="form-label">
                        Program Studi
                    </label>

                    <input
                        type="text"
                        name="prodi"
                        class="form-control"
                        value="<?php echo e(old('prodi',$user->prodi)); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Fakultas
                    </label>

                    <input
                        type="text"
                        name="fakultas"
                        class="form-control"
                        value="<?php echo e(old('fakultas',$user->fakultas)); ?>">
                </div>

            <?php endif; ?>

            <div class="mb-3">
                <label class="form-label">
                    Nomor HP
                </label>

                <input
                    type="text"
                    name="no_hp"
                    class="form-control"
                    value="<?php echo e(old('no_hp',$user->no_hp)); ?>">
            </div>

            <hr>

            <div class="d-flex justify-content-between">

                <a href="<?php echo e(route('profile.show')); ?>"
                   class="btn btn-secondary">
                    Kembali
                </a>

                <button
                    type="submit"
                    class="btn btn-primary">
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Maulidina Aisha K\Documents\KULIAH\4. Semester 4\Analisis dan Desain Sistem 4B\App E-Banding UKT\resources\views/profile/edit.blade.php ENDPATH**/ ?>