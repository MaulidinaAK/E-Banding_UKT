<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>E-Banding UKT</title>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

</head>

<body
style="
font-family:Inter,sans-serif;
background:#F4F7FC;
">

<div
style="
min-height:100vh;
display:flex;
justify-content:center;
align-items:center;
padding:40px;
">

<div
style="
width:1000px;
max-width:100%;
display:grid;
grid-template-columns:380px 520px;
background:white;
border-radius:30px;
overflow:hidden;
box-shadow:0 25px 70px rgba(37,99,235,.10);
">

    <!-- LEFT -->

   <div
class="login-left"
style="
background:linear-gradient(
135deg,
#163B9D 0%,
#2563EB 45%,
#60A5FA 100%
);
position:relative;
overflow:hidden;
color:white;
padding:60px;
display:flex;
flex-direction:column;
justify-content:center;
">

    <div class="shape shape1"></div>
    <div class="shape shape2"></div>
    <div class="shape shape3"></div>

    <div style="font-size:70px;">
        🎓
    </div>

    <h1 style="font-size:42px;font-weight:700;margin-top:20px;">
        E-Banding UKT
    </h1>

    <p style="margin-top:18px;line-height:1.8;color:#E2E8F0;font-size:17px;">
        Sistem digital untuk pengajuan banding
        Uang Kuliah Tunggal secara mudah,
        transparan, dan efisien.
    </p>

</div>


    <!-- RIGHT -->

    <div
    style="
    padding:70px 60px;
    ">

        <h2
        style="
        font-size:34px;
        color:#1E3A8A;
        font-weight:700;
        ">

            Welcome Back 👋

        </h2>

        <p
        style="
        color:#64748B;
        margin-bottom:35px;
        ">

            Login untuk melanjutkan ke sistem.

        </p>

        <?php echo e($slot); ?>


    </div>

</div>

</div>

</body>
</html><?php /**PATH C:\Users\Maulidina Aisha K\Documents\KULIAH\4. Semester 4\Analisis dan Desain Sistem 4B\App E-Banding UKT\resources\views/layouts/guest.blade.php ENDPATH**/ ?>