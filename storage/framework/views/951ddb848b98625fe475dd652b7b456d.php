<?php $__env->startSection('content'); ?>

<?php
    $dashboard = match($user->role->name) {
        'Mahasiswa' => 'mahasiswa.dashboard',
        'Admin TU' => 'admin.dashboard',
        'Kaprodi' => 'kaprodi.dashboard',
        'Dekan' => 'dekan.dashboard',
        default => 'profile.show'
    };
?>


<div class="mb-3">

    <a href="<?php echo e(route($dashboard)); ?>"
       class="btn btn-sm btn-outline-primary">

        <i class="bi bi-arrow-left"></i>
        Dashboard

    </a>

</div>



<h2 class="mb-4">
    Profil Saya
</h2>


<?php if(session('success')): ?>

<div class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>

<?php endif; ?>



<div class="text-center mb-4">


    <?php if($user->photo): ?>

        <img src="<?php echo e($user->photo_url); ?>"
             width="120"
             height="120"
             class="rounded-circle mb-3"
             style="object-fit:cover;">

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
            color:#666;
        ">

            No Photo

        </div>

    <?php endif; ?>


</div>



<div class="card shadow-sm">

<div class="card-body">


<h5 class="fw-bold">
    <?php echo e($user->name); ?>

</h5>


<small class="text-muted">
    <?php echo e($user->role->name); ?>

</small>


<hr>



<table class="table">


<tr>

<th width="200">
    Email
</th>

<td>
    <?php echo e($user->email); ?>

</td>

</tr>




<?php if($user->role->name == 'Mahasiswa'): ?>


<tr>

<th>
    NIM
</th>

<td>
    <?php echo e($user->nim); ?>

</td>

</tr>


<tr>

<th>
    Program Studi
</th>

<td>
    <?php echo e($user->prodi); ?>

</td>

</tr>


<tr>

<th>
    Fakultas
</th>

<td>
    <?php echo e($user->fakultas); ?>

</td>

</tr>


<tr>

<th>
    Semester
</th>

<td>
    <?php echo e($user->semester); ?>

</td>

</tr>



<?php endif; ?>





<?php if(in_array($user->role->name,['Admin TU','Kaprodi','Dekan'])): ?>


<tr>

<th>
    NIP
</th>

<td>
    <?php echo e($user->nip); ?>

</td>

</tr>


<?php endif; ?>





<?php if(in_array($user->role->name,['Admin TU','Kaprodi','Dekan'])): ?>


<tr>

<th>
    Fakultas
</th>

<td>
    <?php echo e($user->fakultas); ?>

</td>

</tr>


<?php endif; ?>





<?php if($user->role->name == 'Kaprodi'): ?>


<tr>

<th>
    Program Studi
</th>

<td>
    <?php echo e($user->prodi); ?>

</td>

</tr>


<?php endif; ?>





<tr>

<th>
    No HP
</th>

<td>
    <?php echo e($user->no_hp); ?>

</td>

</tr>



</table>



<a href="<?php echo e(route('profile.edit')); ?>"
   class="btn btn-primary">

    <i class="bi bi-pencil"></i>
    Edit Profil

</a>



</div>

</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Maulidina Aisha K\Documents\KULIAH\4. Semester 4\Analisis dan Desain Sistem 4B\App E-Banding UKT\resources\views/profile/index.blade.php ENDPATH**/ ?>