<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title><?= $Title?> - Sistem Manajemen Ormawa</title>
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/jQueryUI/jquery-ui.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/ckeditor/contents.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/morris/morris.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/select2/select2.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker-bs3.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/iCheck/all.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/colorpicker/bootstrap-colorpicker.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/sweet-alert2/sweetalert2.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datepicker/datepicker3.css">
        <script src="<?php echo base_url(); ?>assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
        <style>
        .example-modal .modal {
        position: relative;
        top: auto;
        bottom: auto;
        right: auto;
        left: auto;
        display: block;
        z-index: 1;
        }
        .example-modal .modal {
        background: transparent !important;
        }
        .latestStuffsBody {
        font-size: 3em;
        color: #fff;
        height: 100px;
        }
        .latestStuffsText {
        font-size: 15px;
        }
        @media (min-width: 768px) {
        .modal-xl {
        width: 90%;
        max-width:1200px;
        }
        }
        .loading-icon {
        position: relative;
        width: 20px;
        height: 20px;
        margin:50px auto;
        -webkit-animation: fa-spin 2s infinite linear;
        animation: fa-spin 2s infinite linear;
        }
        .loading-icon:before {
        content: "\f110";
        font-family: FontAwesome;
        font-size:20px;
        position: absolute;
        top: 0;
        }
        </style>
    </head>
    <body style="padding-top:60px;">
        <nav class="navbar navbar-inverse navbar-fixed-top bg-blue" style="-moz-box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= site_url('dpm/dpm') ?>" style="color: #fff">Sistem Manajemen Ormawa</a>
                <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                    <ul class="nav navbar-nav" style="margin:0px">
                        <li>
                            <a href="<?= site_url('welcome') ?>" style="color: #fff" target="_blank">Lihat Situs <i class="fa fa-external-link"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li  class="<?= $Title == 'Dpm' ? 'active' : '' ?>">
                        <a href="<?= site_url('dpm/dpm') ?>" style="color: #fff">
                            <i class="fa fa-laptop"></i> Dpm
                        </a>
                    </li>
                    <li  class="<?= $Title == 'Logout' ? 'active' : '' ?>">
                        <a href="<?= site_url('dpm/dpm/logout') ?>" style="color: #fff">
                            <i class="fa fa-sign-out"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </body>
    <div class="container-fluid">