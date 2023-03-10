<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?php echo app('translator')->get('site.title'); ?></title>
    <link rel="icon" type="image/png" href="<?php echo e(asset('public/dashboard_files/img/logo.png')); ?>">

    
    <link rel="stylesheet" href="<?php echo e(asset('public/dashboard_files/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/dashboard_files/css/ionicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/dashboard_files/css/skin-blue.min.css')); ?>">

    <?php if(app()->getLocale() == 'ar'): ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/dashboard_files/css/font-awesome-rtl.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/dashboard_files/css/AdminLTE-rtl.min.css')); ?>">
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('public/dashboard_files/css/bootstrap-rtl.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/dashboard_files/css/rtl.css')); ?>">

    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Cairo', sans-serif !important;
        }
    </style>
    <?php else: ?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="<?php echo e(asset('public/dashboard_files/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/dashboard_files/css/AdminLTE.min.css')); ?>">
    <?php endif; ?>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

</head>

<body class="login-page">

    <div class="login-box">

        <div class="login-logo">
            <a href="../../index2.html"><b>
                    <title><?php echo app('translator')->get('site.title'); ?></title>
                </b></a>
        </div><!-- end of login lgo -->

        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="<?php echo e(route('login')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('post')); ?>


                <?php echo $__env->make('partials._errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="form-group has-feedback">
                    <input type="email" name="email" class="form-control" placeholder="<?php echo app('translator')->get('site.email'); ?>">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="<?php echo app('translator')->get('site.password'); ?>">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="form-group">
                    <label style="font-weight: normal;"><input type="checkbox" name="remember">
                        <?php echo app('translator')->get('site.remember_me'); ?></label>
                </div>

                <button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo app('translator')->get('site.login'); ?></button>

            </form><!-- end of form -->

        </div><!-- end of login body -->

    </div><!-- end of login-box -->

    
    <script src="<?php echo e(asset('public/dashboard_files/js/jquery.min.js')); ?>"></script>

    
    <script src="<?php echo e(asset('public/dashboard_files/js/bootstrap.min.js')); ?>"></script>

    
    <script src="<?php echo e(asset('public/dashboard_files/plugins/icheck/icheck.min.js')); ?>"></script>

    
    <script src="<?php echo e(asset('public/dashboard_files/js/fastclick.js')); ?>"></script>

</body>

</html><?php /**PATH /home/apptdhaz/public_html/estisharati/resources/views/auth/login.blade.php ENDPATH**/ ?>