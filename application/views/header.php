<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>SIPP</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url(); ?>assets/logo.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="<?php echo base_url(); ?>assets/css/font.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/font-icon.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Light Gallery Plugin Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/light-gallery/css/lightgallery.css" rel="stylesheet">

    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Multi Select Css -->
    <!-- <link href="<?php echo base_url(); ?>assets/plugins/multi-select/css/multi-select.css" rel="stylesheet"> -->

    <!-- Bootstrap Select Css -->
    <!-- <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" /> -->

    <!-- JQuery DataTable Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Sweetalert Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url(); ?>assets/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo base_url(); ?>">SIPP</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Notifications -->
                    <li class="dropdown">
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url(); ?>assets/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('nm_user'); ?></div>
                    <div class="email"><?php echo $this->session->userdata('username'); ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Logout</i>
                        <ul class="dropdown-menu pull-right">

                            <li><a href="<?php echo base_url('Login/logout') ?>">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <?php if ($this->session->userdata('otoritas') == "Pembelian") { ?>
                        <li>
                            <a href="<?php echo base_url() ?>">
                                <i class="material-icons">home</i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                    <?php }
                    if ($this->session->userdata('otoritas') == "Pembelian" || $this->session->userdata('otoritas') == "Penjualan") { ?>
                        <li>
                            <a href="<?php echo base_url('Master/Etalase') ?>">
                                <i class="material-icons">dns</i>
                                <span>Etalase</span>
                            </a>
                        </li>
                    <?php }

                    if ($this->session->userdata('level') <> "User") { ?>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">book</i>
                                <span>Master</span>
                            </a>
                            <ul class="ml-menu">
                                <!-- <li>
                                <a href="<?php echo base_url('Master/Timbangan') ?>">Timbangan</a>
                            </li> -->
                                <li>
                                    <a href="<?php echo base_url('Master/Customer') ?>">Customer</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('Master/Supplier') ?>">Supplier</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('Master/NoNota') ?>">No. Nota</a>
                                </li>
                                <?php if ($this->session->userdata('otoritas') == "Pembelian") { ?>
                                    <li>
                                        <a href="<?php echo base_url('Master/KodeBarang') ?>">Kode Barang</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('Master/Barang') ?>">Barang</a>
                                    </li>
                                <?php }
                                if (($this->session->userdata('level') == "Developer" || $this->session->userdata('level') == "SuperAdmin") && $this->session->userdata('otoritas') == "Pembelian") { ?>
                                    <li>
                                        <a href="<?php echo base_url('Master/Administrator') ?>">Administrator</a>
                                    </li>
                                <?php } ?>
                                <!-- <li>
                                <a href="<?php echo base_url('Master/PO') ?>">PO</a>
                            </li> -->
                            </ul>
                        </li>
                    <?php } ?>
                    <!-- <li>
                        <a href="<?php echo base_url('Master/Packing_list') ?>">
                            <i class="material-icons">list</i>
                            <span>Packing List</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('Master/Price_List') ?>">
                            <i class="material-icons">list</i>
                            <span>Price List</span>
                        </a>
                    </li> -->
                    <?php if ($this->session->userdata('otoritas') == "Pembelian") { ?>
                        <li>
                            <a href="<?php echo base_url('Master/Price_List') ?>">
                                <i class="material-icons">list</i>
                                <span>Price List</span>
                            </a>
                        </li>
                    <?php }
                    if ($this->session->userdata('otoritas') == "Penjualan") { ?>
                        <li>
                            <a href="<?php echo base_url('Master/PlPackingList') ?>">
                                <i class="material-icons">list</i>
                                <span>Packing List</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('Master/Invoice') ?>">
                                <i class="material-icons">list</i>
                                <span>Invoice</span>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if ($this->session->userdata('level') <> "User") { ?>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">equalizer</i>
                                <span>Laporan</span>
                            </a>
                            <ul class="ml-menu">


                                <?php if ($this->session->userdata('otoritas') == "Pembelian") { ?>
                                    <li>
                                        <a href="<?php echo base_url('Laporan/Pembelian') ?>">Pembelian</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('Laporan/BarangMasuk') ?>">Barang Masuk</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('Laporan/DaftarHutangCash') ?>">Daftar Hutang dan Cash</a>
                                    </li>
                                <?php } ?>
                                <?php if ($this->session->userdata('otoritas') == "Penjualan") { ?>
                                    <li>
                                        <a href="<?php echo base_url('Laporan/Penjualan') ?>">Penjualan</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('Laporan/SuratOrder') ?>">Surat Order</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('Laporan/BukuPenerimaanManual') ?>">Buku Penerimaan Manual</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('Laporan/LapPiutang') ?>">Piutang</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('Laporan/LapBarangKeluar') ?>">Barang Keluar</a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php } ?>

                </ul>
            </div>
            <!-- if($this->session->userdata('username') == "develop") -->
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    SI PP
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <!-- #END# Right Sidebar -->
    </section>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/js/jquery.priceformat.js"></script> -->