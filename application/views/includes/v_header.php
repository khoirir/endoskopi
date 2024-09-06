<?php
$explodee = explode("/", $_SERVER["PHP_SELF"]);
$url = end($explodee);

// $urlGet = explode("/",$_SERVER["PHP_SELF"]);
$url2 = isset($explodee[4]) ? $explodee[4] : "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Endoskopi - RSUKH</title>

    <!-- Global stylesheets -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>template/assets/images/logorskh2.png">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>template/assets/css/font.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>template/assets/css/icons/icomoon/styles.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>template/assets/css/icons/fontawesome/styles.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>template/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>template/assets/css/core.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>template/assets/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>template/assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>template/assets/css/extras/animate.min.css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/plugins/loaders/pace.min.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/plugins/loaders/blockui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/core/app.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/plugins/forms/inputs/typeahead/handlebars.min.js"></script> -->
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/plugins/forms/inputs/alpaca/alpaca.min.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/pages/form_select2.js"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script> -->
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script> -->
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/plugins/ui/prism.min.js"></script> -->
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/plugins/forms/styling/uniform.min.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/pages/datatables_responsive.js"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/plugins/ui/ripple.min.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/plugins/notifications/sweet_alert.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/pages/animations_css3.js"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/plugins/forms/tags/tagsinput.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/plugins/forms/tags/tokenfield.min.js"></script> -->
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/pages/form_inputs.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/function.js"></script>

    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/plugins/uploaders/fileinput/plugins/purify.min.js"></script> -->
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/plugins/uploaders/fileinput/fileinput.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/pages/uploader_bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/dataTables.select.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/core/libraries/jquery_ui/core.min.js"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/pages/form_floating_labels.js"></script> -->
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/pages/datatables_extension_select.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/plugins/tables/datatables/extensions/select.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/plugins/forms/selects/select2.min.js"></script> -->



</head>

<body class="navbar-top">

    <!-- Main navbar -->
    <div class="navbar navbar-default navbar-fixed-top header-highlight">
        <div class="navbar-header">
            <div class="navbar-brand">
            </div>

            <ul class="nav navbar-nav visible-xs-block">
                <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
            </ul>
        </div>

        <!-- <div class="navbar-collapse collapse" id="navbar-mobile">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url(); ?>template/assets/images/placeholder.jpg" alt="">
                        <span>Victoria</span>
                        <i class="caret"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
                        <li><a href="#"><i class="icon-coins"></i> My balance</a></li>
                        <li><a href="#"><span class="badge bg-teal-400 pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
                        <li><a href="#"><i class="icon-switch2"></i> Logout</a></li>
                    </ul>
                </li>
            </ul> -->

        <!-- <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <div class="icon-bell2"></div>
                            <span id='notifikasi' class="label bg-danger-400"></span>
                        </a>

                        <div class="dropdown-menu dropdown-content">
                            <div class="dropdown-content-heading">
                                NOTIFIKASI
                                <ul class="icons-list">
                                    <li><a href="#"><i class="icon-menu7"></i></a></li>
                                </ul>
                            </div>

                            <ul class="media-list dropdown-content-body width-350">


                            </ul>
                        </div>
                    </li>
                    <li><a href="<?php echo base_url('login/keluar'); ?>"><i class="icon-switch2"></i> <span></span></a></li>									
                </ul>
            </div> -->
        <!-- </div> -->
    </div>
    <!-- /main navbar -->


    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main sidebar -->
            <div class="sidebar sidebar-main sidebar-fixed">
                <div class="sidebar-content">

                    <!-- User menu -->
                    <!-- <div class="sidebar-user-material">
						<div class="category-content">
							<div class="sidebar-user-material-content">
								<a><img src="<?php echo base_url(); ?>template/assets/images/logorskh1.png" class="img-circle img-responsive" alt=""></a>
								<h6><?php echo strtoupper($nama); ?></h6>
							</div> -->

                    <!-- <div class="sidebar-user-material-menu">
								<a href="#user-nav" data-toggle="collapse"><span>PROFIL</span> <i class="caret"></i></a>
							</div> -->
                    <!-- </div> -->

                    <!-- <div class="navigation-wrapper collapse" id="user-nav">
							<ul class="navigation">
								<li><a href="#"><i class="icon-user-plus"></i> <span>AKUN</span></a></li>
								<li><a onclick="logout()"><i class="icon-switch2"></i> <span>LOGOUT</span></a></li>
							</ul>
						</div> -->
                    <!-- </div> -->
                    <!-- /user menu -->

                    <!-- <div class="sidebar-user">
                        <div class="category-content">
                            <div class="media">
                                <a href="#" class="media-left"><img
                                        src="<?php echo base_url(); ?>template/assets/images/user.svg"
                                        class="img-circle img-sm" alt=""></a>
                                <div class="media-body">
                                    <span class="media-heading text-semibold"><?php echo strtoupper($nama); ?></span>
                                    <div class="text-size-mini text-muted">
                                        <i class="icon-pin text-size-small"></i> &nbsp;RSU Karsa Husada Batu
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="sidebar-user">
                        <div class="category-content">
                            <div class="media">
                                <div class="media-header">
                                    <a href="#"><img src="<?= base_url(); ?>/template/assets/images/user3.svg" class="img-circle img-lg" alt="" style="display:block;margin:auto;"></a>
                                </div>
                                <br>
                                <div class="media-body">
                                    <span class="media-heading text-semibold" style="text-align: center"><?php echo strtoupper($nama); ?></span>
                                    <div class="text-size-mini text-muted" style="text-align: center">
                                        ENDOSKOPI
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Main navigation -->
                    <div class="sidebar-category sidebar-category-visible">
                        <div class="category-content no-padding">
                            <ul class="navigation navigation-main navigation-accordion">

                                <!-- Main -->
                                <li class="navigation-header">
                                    <span>MENU UTAMA</span>
                                    <i class="icon-menu" title="Main pages"></i>
                                </li>
                                <li <?php if ($url == "dashboard") echo 'class="active"'; ?>>
                                    <a href="<?php echo base_url("dashboard"); ?>">
                                        <i class="icon-home4"></i>
                                        <span>BERANDA</span>
                                    </a>
                                </li>
                                <li <?php if ($url == "registrasipasien") echo 'class="active"'; ?>>
                                    <a href="<?php echo base_url("registrasipasien"); ?>">
                                        <img style="float: left; width: 20px; height: auto; margin-right: 12px; margin-left: -1px;" src="<?php echo base_url(); ?>/template/assets/css/icons/patient.svg">
                                        <span>REGISTRASI PASIEN</span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <i class="icon-list2"></i>
                                        <span>PERMINTAAN OPERASI</span>
                                    </a>
                                    <ul>
                                        <li <?php if ($url == "permintaanbelum") echo 'class="active"'; ?>>
                                            <a href="<?php echo base_url('permintaanbelum') ?>">
                                                <img style="float: left; width: 22px; height: auto; margin-right: 7px; margin-left: auto;" src="<?php echo base_url(); ?>/template/assets/css/icons/ok_datamasuk.png">
                                                BELUM DIKONFIRMASI<span id='belumkonfirmasi' class="label bg-warning-400"></span>
                                            </a>
                                        </li>
                                        <li <?php if ($url == "permintaansudah" || $url2 == "isitindakan") echo 'class="active"'; ?>>
                                            <a href="<?php echo base_url('permintaansudah') ?>">
                                                <img style="float: left; width: 22px; height: auto; margin-right: 7px; margin-left: auto;" src="<?php echo base_url(); ?>/template/assets/css/icons/ok_daftar.png">
                                                SUDAH DIKONFIRMASI<span id='sudahkonfirmasi' class="label bg-info-400"></span>
                                            </a>
                                        </li>
                                        <li <?php if ($url == "permintaanselesaitindakan" || $url2 == "edittindakan") echo 'class="active"'; ?>>
                                            <a href="<?php echo base_url('permintaanselesaitindakan') ?>">
                                                <img style="float: left; width: 22px; height: auto; margin-right: 7px; margin-left: auto;" src="<?php echo base_url(); ?>/template/assets/css/icons/ok_selesai.png">
                                                SELESAI TINDAKAN<span id='selesaitindakan' class="label bg-success-400"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- <li <?php if ($url == "tindakan" || $url2 == "tindakan") echo 'class="active"'; ?>>
                                    <a href="<?php echo base_url('tindakan') ?>"><img style="float: left; width: 19px; height: auto; margin-right: 12px;" src="<?php echo base_url(); ?>/template/assets/css/icons/pasien.svg">
                                        <span>TINDAKAN PASIEN</span>
                                    </a>
                                </li> -->
                                <li <?php if ($url == "operasiselesai" || $url2 == "mutupelayanan") echo 'class="active"'; ?>>
                                    <a href="<?php echo base_url('operasiselesai') ?>"><img style="float: left; width: 20px; height: auto; margin-right: 12px;" src="<?php echo base_url(); ?>/template/assets/css/icons/medical-folder.svg">
                                        <span>OPERASI SELESAI</span>
                                    </a>
                                </li>
                                <li class="navigation-header">
                                    <span>MENU KELUAR</span>
                                    <i class="icon-menu" title="Main pages"></i>
                                </li>
                                <li>
                                    <a onclick="logout()"><i class="icon-exit3"></i>
                                        <span>KELUAR</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <!-- /main navigation -->
                </div>
            </div>
            <!-- /main sidebar -->

            <script type="text/javascript">
                $(document).ready(function() {
                    setInterval(function() {
                        setCount();
                    }, 60000);
                    setCount();
                });

                var lastResponse = ''

                function setCount() {
                    $.ajax({
                        type: "GET",
                        url: "<?php echo base_url('header/getCountPermintaan'); ?>",
                        dataType: "JSON",
                        success: function(data, response) {
                            // _('notifikasi').innerHTML = data['belumbaca'];
                            _('belumkonfirmasi').innerHTML = data['belum'];
                            _('sudahkonfirmasi').innerHTML = data['sudah'];
                            _('selesaitindakan').innerHTML = data['selesaitindakan'];
                        }
                    });
                }

                window.onkeydown = function(e) {
                    if (e.keyCode == 8 && e.target == document.body)
                        e.preventDefault();
                }

                function logout() {
                    swal({
                            title: "Keluar Aplikasi",
                            text: "Apakah Yakin Keluar Aplikasi?",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#EF5350",
                            confirmButtonText: "YA",
                            cancelButtonText: "TIDAK",
                            closeOnConfirm: true,
                            closeOnCancel: true
                        },
                        function(isConfirm) {
                            if (isConfirm) {
                                localStorage.removeItem("tglawalendoskopi");
                                localStorage.removeItem("tglakhirendoskopi");
                                localStorage.removeItem("jenisopendoskopi");
                                localStorage.removeItem("operatorendoskopi");
                                // localStorage.removeItem("noregistrasiop");
                                window.location.href = "<?php echo base_url('login/keluar'); ?>";
                            }
                        });
                }
            </script>