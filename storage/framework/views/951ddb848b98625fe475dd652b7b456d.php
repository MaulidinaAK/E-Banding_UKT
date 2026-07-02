<?php $__env->startSection('content'); ?>

<h2>Profil Saya</h2>

<?php if(session('success')): ?>
<div class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<div class="text-center mb-3">

    <?php if($user->foto): ?>
        <img src="<?php echo e(asset('storage/'.$user->foto)); ?>"
             class="rounded-circle"
             width="120"
             height="120"
             style="object-fit: cover;">
    <?php else: ?>
        <div style="
            width:120px;
            height:120px;
            border-radius:50%;
            background:#ddd;
            display:flex;
            align-items:center;
            justify-content:center;
            margin:auto;
            font-size:12px;
            color:#666;
        ">
            No Photo
        </div>
    <?php endif; ?>

</div>

<div class="card">

    <div class="card-body">

        <?php if($user->foto): ?>
    <img src="<?php echo e(asset('storage/'.$user->foto)); ?>"
         width="120"
         height="120"
         class="rounded-circle mb-3">
<?php else: ?>
    <div class="text-muted mb-2">
        Belum ada foto
    </div>
<?php endif; ?>

<h5><?php echo e($user->name); ?></h5>

        <table class="table">

            <tr>
                <th>Email</th>
                <td><?php echo e($user->email); ?></td>
            </tr>

            <?php if($user->role->name == 'Mahasiswa'): ?>

            <tr>
                <th>NIM</th>
                <td><?php echo e($user->nim); ?></td>
            </tr>

            <tr>
                <th>Program Studi</th>
                <td><?php echo e($user->prodi); ?></td>
            </tr>

            <tr>
                <th>Fakultas</th>
                <td><?php echo e($user->fakultas); ?></td>
            </tr>

            <tr>
                <th>Semester</th>
                <td><?php echo e($user->semester); ?></td>
            </tr>

            <?php endif; ?>

            <?php if($user->role->name != 'Mahasiswa'): ?>

            <tr>
                <th>NIP</th>
                <td><?php echo e($user->nip); ?></td>
            </tr>

            <?php endif; ?>

            <tr>
                <th>No HP</th>
                <td><?php echo e($user->no_hp); ?></td>
            </tr>

        </table>

        <a href="<?php echo e(route('profile.edit')); ?>"
   class="btn btn-primary">

    Edit Profil

</a>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Maulidina Aisha K\Documents\KULIAH\4. Semester 4\Analisis dan Desain Sistem 4B\App E-Banding UKT\resources\views/profile/index.blade.php ENDPATH**/ ?>