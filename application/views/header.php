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
                <a class="navbar-brand" href="<?php echo base_url(); ?>">SI PEMBELIAN</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    
                    <!-- Notifications -->
                    <li class="dropdown">
                        
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
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
                    <li>
                        <a href="<?php echo base_url() ?>">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    
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
                                <a href="<?php echo base_url('Master/Supplier') ?>">Supplier</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('Master/NoNota') ?>">No. Nota</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('Master/Barang') ?>">Barang</a>
                            </li>
                            <?php if($this->session->userdata('level') == "Developer" || $this->session->userdata('level') == "SuperAdmin") { ?>
                            <li>
                                <a href="<?php echo base_url('Master/Administrator') ?>">Administrator</a>
                            </li>
                            <?php } ?>
                            <!-- <li>
                                <a href="<?php echo base_url('Master/Perusahaan') ?>">Perusahaan</a>
                            </li> -->
                            <!-- <li>
                                <a href="<?php echo base_url('Master/PO') ?>">PO</a>
                            </li> -->
                        </ul>
                    </li>
                    <!-- <li>
                        <a href="<?php echo base_url('Master/Packing_list') ?>">
                            <i class="material-icons">list</i>
                            <span>Packing List</span>
                        </a>
                    </li> -->
                    <li>
                        <a href="<?php echo base_url('Master/Price_List') ?>">
                            <i class="material-icons">list</i>
                            <span>Price List</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="<?php echo base_url('Master/PL_Price_List') ?>">
                            <i class="material-icons">list</i>
                            <span>Packing List</span>
                        </a>
                    </li> -->
                    <!-- <li>
                        <a href="<?php echo base_url('Master/Invoice') ?>">
                            <i class="material-icons">list</i>
                            <span>Invoice</span>
                        </a>
                    </li> -->
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">equalizer</i>
                            <span>Laporan</span>
                        </a>
                        <ul class="ml-menu">
                            <!-- <li>
                                <a href="<?php echo base_url('Laporan/print_sj') ?>">SURAT JALAN</a>
                            </li> -->
                            <li>
                                <a href="<?php echo base_url('Laporan/print_barang') ?>">BARANG</a>
                            </li>
                            <!-- <li>
                                <a href="<?php echo base_url('Laporan/print_sj') ?>">TOTAL PEMBELIAN</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('Laporan/print_sj') ?>">REKAP PER NO NOTA</a> -->
                            </li>
                            <!-- <?php if($this->session->userdata('level') == "SuperAdmin") { ?>
                                <li>
                                    <a href="<?php echo base_url('Laporan/update_po') ?>">UPDATE PO</a>
                                </li>
                            <?php } ?> -->
                        </ul>
                    </li>
                    
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
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>
    
    <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/js/jquery.priceformat.js"></script> -->
    
           