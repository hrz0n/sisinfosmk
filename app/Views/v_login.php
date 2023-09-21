<!DOCTYPE html>
<html lang="ID">
<head>
    <title><?= $page_title.' ─  '.$page_desc;?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= $page_desc ?>">
    <meta name="keywords" content="<?= $page_key ?>">
    <meta name="author" content="Harison">

    <link rel="icon" href="<?= base_url('images/favicon.ico'); ?>" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/fonts-awesome.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/animate.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/hamburgers.css'); ?>">

    <link rel="stylesheet" type="text/css" href="<?= base_url('css/util.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/main.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/notyf.min.css'); ?>">

<body>
<div class="loader"></div>
<div class="limiter">
    <div class="container-login100" style="background-image: url('<?= base_url("bg-login.jpeg"); ?>');">
        <div class="wrap-login100 p-t-190 p-b-30">
            <form id="frmLogin" action="<?= base_url('login/auth'); ?>" method="post" class="login100-form validate-form">
                <?= csrf_field(); ?>
                <div class="">
                    <img  class="img-fluid" src="<?= base_url('images/logo.png');?>">
                </div>

                <small class="p-b-45 text-white mt-2 text-center"><code><b>#</b></code>MerdekaEntriNilai <code><b>#</b></code>MerdekaCetakRaport</small>
                <?php if (session()->getFlashdata('pesan')):?>

                    <div class="col alert alert-danger">
                        <?= session()->getFlashdata('pesan') ;?>
                    </div>
                <?php endif ;?>

                <div class="wrap-input100 validate-input m-b-10" data-validate="Username is required">
                    <input class="input100" type="text" name="username" id="uname" placeholder="Username">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100"><i class="fa fa-user"></i></span>
                </div>
                <div class="wrap-input100 validate-input m-b-10" data-validate="Password is required">
                    <input class="input100" type="password" name="password" id="pwd" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100"><i class="fa fa-lock"></i></span>
                </div>


                <div class="row mt-2 p-2">
                    <div class="col-md-12" >
                        <div class="form-check checkbox">
                            <label class="form-check-label text-white" for="x_show">
                                <input class="form-check-input mr-2" name="x_show" id="x_show" type="checkbox" value="1"/>Tampilkan password</label>
                        </div>
                        <div class="form-check checkbox">
                            <label class="form-check-label text-white" for="x_rmbr">
                                <input class="form-check-input mr-2" name="x_rmbr" id="x_rmbr" type="checkbox" value="1"/> Selalu ingat saya</label>
                        </div>
                    </div>
                </div>

                <div class="container-login100-form-btn p-t-10">
                    <button id="btnlogin" name="btnlogin" class="login100-form-btn" type="submit" >
                        Login
                    </button>
                </div>


                <div class="text-center w-full p-t-25 p-b-230">
                    <button id="forgotpwd" class="text-white btn btn-link px-0 mb-0" type="button"><small>Lupa password?</small></button>
                </div>

                <div class="col-md-12 mt-3 text-center w-full"><small>
                        <a class="text-muted" id="cp" href="/">EiS (Educational Information System)</a>
                        <span class="text-muted" id="delta"> &copy; <?= date('Y');?> Kode Ajaib.  All rights reserved.</span></small>
                </div>

            </form>
        </div>
    </div>
</div>

<script src="<?= base_url('/js/jquery.min.js'); ?>"></script>
<script src="<?= base_url('/js/popper.min.js'); ?>"></script>
<script src="<?= base_url('/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('/js/notyf.min.js'); ?>"></script>
<!-- <script type="text/javascript" src="<?= base_url('/js/load.js'); ?>"></script> -->

<script type="text/javascript">
    $(document).ready(function(){
        $(".loader").fadeOut("slow");
        $('#uname').focus();
        urlserver = "api/loginApi.php";
        save_method = 'add';

        $('#btnlogin').click(function(){
            doLogin();
        });


        $('#forgotpwd').click(function(){
            notyf.success("Silahkan hubungi Administrator/Pengawas Anda...");
        });

        $('#uname').keydown(function (e){
            var pass = $('#pwd').val();
            if(e.keyCode == 13){
                if (pass =="") {
                    $('#pwd').focus();
                } else {
                    doLogin();
                }

            }
        });

        $('#pwd').keydown(function (e){
            var uname = $('#uname').val();
            if(e.keyCode == 13){
                if (uname =="") {
                    $('#uname').focus();
                } else {
                    doLogin();
                }

            }
        });

        $('#x_show').click(function(){
            if($(this).is(':checked')){
                $('#pwd').attr('type','text');
            }else{
                $('#pwd').attr('type','password');
            }
        });
    });
</script>

</body>
</html>