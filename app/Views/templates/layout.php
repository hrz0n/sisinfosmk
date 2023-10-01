<!DOCTYPE html>
<html lang="ID">
<head>
    <title><?= $page_title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="<?= $page_desc ?>">
    <meta name="keywords" content="<?= $page_key ?>">
    <meta name="author" content="Harison">
    <link rel="icon" href="<?= base_url('images/favicon.ico') ?>" type="image/x-icon">
    <link href="<?= base_url('css/googlefont.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('icon/feather/css/feather.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/style.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/jquery.mCustomScrollbar.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/notyf.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/select2.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/select2-bootstrap-5-theme.min.css'); ?>">
    <script type="text/javascript" src="<?= base_url('js/jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('js/jquery-ui.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('js/select2.min.js'); ?>"></script>
    <style>
        
        .has-search .form-control {
            padding-left: 2.375rem;
        }

        .has-search .form-control-feedback {
            position: absolute;
            z-index: 2;
            display: block;
            width: 2.375rem;
            height: 2.375rem;
            line-height: 1.8rem;
            text-align: center;
            pointer-events: none;
            color: #aaa;
        }
    </style>
</head>
<body>
<div class="theme-loader">
    <div class="ball-scale">
        <div class='contain'>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
        </div>
    </div>
</div>

<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        <?= $this->include('templates/header-menu'); ?>
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <?= $this->include('templates/sidebar'); ?>
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">
                                <div class="page-body">
                                    <?= $this->renderSection('content'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript" src="<?= base_url('js/popper.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('js/jquery.slimscroll.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('js/modernizr.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('js/Chart.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('js/jquery.multi-select.js.js'); ?>"></script>

<script src="<?= base_url('js/amcharts.js'); ?>"></script>
<script src="<?= base_url('js/serial.js'); ?>"></script>
<script src="<?= base_url('js/light.js'); ?>"></script>
<script src="<?= base_url('js/jquery.mCustomScrollbar.concat.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('js/SmoothScroll.js'); ?>"></script>
<script src="<?= base_url('js/pcoded.min.js'); ?>"></script>

<script src="<?= base_url('js/vartical-layout.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('js/script.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('js/notyf.min.js'); ?>"></script>

<script type="text/javascript" src="<?= base_url('js/datatables.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('js/dataTables.select.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('js/dataTables.checkboxes.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('js/load.js'); ?>"></script>

<?= $this->renderSection('scripts'); ?>
</body>
</html>