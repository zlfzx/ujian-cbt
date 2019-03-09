<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url('./../assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css');?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('./../assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css');?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('./../assets/adminlte/dist/css/AdminLTE.min.css');?>">
    <!-- jQuery 3 -->
    <script src="<?= base_url('./../assets/adminlte/bower_components/jquery/dist/jquery.min.js');?>"></script>
    <!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('./../assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
</head>
<body class="login-page">

    <div class="login-box">
        <div class="login-box-body">
            <h1 class="text-center login-box-msg">Login</h1>

            <?php if($this->session->flashdata('gagal') == true){ ?>
            <div class="alert alert-danger alert-dismissable">
                <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-warning"></i> Username / Password salah
            </div>
            <?php } ?>

            <form action="<?=base_url('login/actlogin');?>" method="post">
                <div class="form-group has-feedback">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group">
                    <select name="akses" id="" class="form-control" required>
                        <option value="">Login sebagai . . .</option>
                        <option value="admin">Admin</option>
                        <option value="guru">Guru</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-info btn-block btn-flat"><i class="fa fa-sign-in"></i> Login</button>
            </form>
        </div>
    </div>

</body>
</html>