<!doctype html>
<html lang="en">

<head>
    <title>CanaryClean</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet">
    <link href="../assets/admin/css/admin.css" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/slick.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/main.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/croppie.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/slick-theme.css')); ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body class="light-theme">

    <?php echo $__env->make('layouts.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main id="main-content">

        <?php echo $__env->yieldContent('content'); ?>

    </main>
    <?php echo $__env->make('layouts.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.includes.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<<<<<<< HEAD
    <?php echo $__env->yieldContent('script'); ?>
=======
    
>>>>>>> f22a34c1d2f10e1ed709009e6060472c07d49a30

</body>
<!-- <script src="../assets/admin/js/admin.js"></script> -->

</html><?php /**PATH /var/www/html/cleaner/resources/views/layouts/app.blade.php ENDPATH**/ ?>