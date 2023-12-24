<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo e(asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo e(asset('admin/bower_components/font-awesome/css/font-awesome.min.css')); ?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo e(asset('admin/bower_components/Ionicons/css/ionicons.min.css')); ?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo e(asset('admin/dist/css/AdminLTE.min.css')); ?>">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo e(asset('admin/plugins/iCheck/square/blue.css')); ?>">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="/">Login Hệ Thống Admin</a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Đăng nhập để bắt đầu phiên làm việc</p>
                <form action="" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->
        <!-- jQuery 3 -->
        <script src="<?php echo e(asset('admin/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo e(asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
    </body>
</html><?php /**PATH C:\Users\Acer\Downloads\web-ban-hang-main\web-ban-hang-main\resources\views/admin/auth/login.blade.php ENDPATH**/ ?>