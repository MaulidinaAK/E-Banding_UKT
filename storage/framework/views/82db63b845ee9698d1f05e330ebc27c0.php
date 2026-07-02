<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Banding UKT</title>

    
    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-primary">
    <div class="container-fluid">

        <span class="navbar-brand">E-Banding UKT</span>

        <?php if(auth()->check()): ?>
        <div class="ms-auto d-flex align-items-center">

            <span class="text-white me-3">
                <?php echo e(auth()->user()->name); ?>

            </span>

            <form action="<?php echo e(route('logout')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <button class="btn btn-light btn-sm">
                    Logout
                </button>
            </form>

        </div>
        <?php endif; ?>

    </div>
</nav>

<div class="container-fluid">
    <div class="row">

        <div class="col-md-2 bg-white border-end min-vh-100 p-3">

            <h5>Menu</h5>
            <hr>

            <?php if(auth()->check() && auth()->user()->role): ?>

                <?php if(auth()->user()->role->name == 'Mahasiswa'): ?>
                    <?php echo $__env->make('layouts.sidebar.mahasiswa', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                <?php elseif(auth()->user()->role->name == 'Admin TU'): ?>
                    <?php echo $__env->make('layouts.sidebar.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                <?php elseif(auth()->user()->role->name == 'Kaprodi'): ?>
                    <?php echo $__env->make('layouts.sidebar.kaprodi', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                <?php elseif(auth()->user()->role->name == 'Dekan'): ?>
                    <?php echo $__env->make('layouts.sidebar.dekan', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php endif; ?>

            <?php endif; ?>

        </div>

        <div class="col-md-10 p-4">
            <?php echo $__env->yieldContent('content'); ?>
        </div>

    </div>
</div>



</body>
</html><?php /**PATH C:\Users\Maulidina Aisha K\Documents\KULIAH\4. Semester 4\Analisis dan Desain Sistem 4B\App E-Banding UKT\resources\views/layouts/app.blade.php ENDPATH**/ ?>