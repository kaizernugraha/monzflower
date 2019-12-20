<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin monzflower</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" type="image/png" href="<?= base_url() ?>assets/images/icons/logo.jpg" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <header class="main-header">
        <!-- Logo -->
        <a href="<?= base_url('dashboard') ?>" class="logo">
            <span class="logo-mini"><img src="<?= base_url() ?>assets/images/icons/logo.jpg" width="50px"></span>
            <span class="logo-lg"><b>Monz</b>Flower <img src="<?= base_url() ?>assets/images/icons/logo.jpg" width="50px"></span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">3</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 9 tasks</li>
                            <li>
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <h3>
                                                Design some buttons
                                                <small class="pull-right">20%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?= base_url() ?>assets/dist/img/avatar04.png" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?= $this->fungsi->user_login()->username ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?= base_url() ?>assets/dist/img/avatar04.png" class="img-circle" alt="User Image">

                                <p>
                                    <?= $this->fungsi->user_login()->nama ?>
                                    <small><?= $this->fungsi->user_login()->alamat ?></small>
                                </p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?= site_url('auth/logout') ?>" onclick="return confirm('Yakin Anda Keluar  <?= $this->fungsi->user_login()->nama ?> ?..')" class="btn btn-danger btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column -->
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= base_url() ?>assets/dist/img/avatar04.png" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?= ucfirst($this->fungsi->user_login()->nama) ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
            <!-- sidebar menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
                    <a href="<?= site_url('dashboard') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                </li>
                <li <?= $this->uri->segment(1) == 'supplier' ? 'class="active"' : '' ?>>
                    <a href="<?= site_url('supplier') ?>"><i class="fa fa-truck"></i> <span>Suppliers</span></a>
                </li>
                <li <?= $this->uri->segment(1) == 'customer' ? 'class="active"' : '' ?>>
                    <a href="<?= site_url('customer') ?>"><i class="fa fa-users"></i> <span>Customer</span></a>
                </li>
                <li class="treeview <?= $this->uri->segment(1) == 'category' || $this->uri->segment(1) == 'unit' || $this->uri->segment(1) == 'tanaman' ? 'active' : '' ?>">
                    <a href="#">
                        <i class="fa fa-archive"></i>
                        <span>Products</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li <?= $this->uri->segment(1) == 'category' ? 'class="active"' : '' ?>><a href="<?= site_url('category') ?>"><i class="fa fa-circle-o text-aqua"></i> Kategori</a></li>
                        <li <?= $this->uri->segment(1) == 'unit' ? 'class="active"' : '' ?>><a href="<?= site_url('unit') ?>"><i class="fa fa-circle-o text-maroon"></i> Unit</a></li>
                        <li <?= $this->uri->segment(1) == 'tanaman' ? 'class="active"' : '' ?>><a href="<?= site_url('tanaman') ?>"><i class="fa fa-circle-o text-success"></i> Tanaman</a></li>
                    </ul>
                </li>
                <li class="treeview <?= $this->uri->segment(1) == 'stock' ? 'active' : '' ?>">
                    <a href="#">
                        <i class="fa fa-cart-plus"></i>
                        <span>Transaksi</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Penjualan</a></li>
                        <li <?= $this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'masuk' ? 'class="active"' : '' ?>>
                            <a href="<?= site_url('stock/masuk') ?>"><i class="fa fa-circle-o"></i> Stock Masuk</a>
                        </li>
                        <li <?= $this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'keluar' ? 'class="active"' : '' ?>>
                            <a href="<?= site_url('stock/keluar') ?>"><i class="fa fa-circle-o"></i> Stock Keluar</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Laporan</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Penjualan</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Stock</a></li>
                    </ul>
                </li>
                <?php if ($this->fungsi->user_login()->level == 1) { ?>
                    <li class="header">SETTING</li>
                    <li><a href="<?= site_url('user') ?>"><i class="fa fa-user"></i> <span>Users</span></a></li>
            </ul>
        <?php } ?>
        </section>
    </aside>

    <!--Ambil Library data tabel-->
    <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Content Wrapper -->
    <div class="content-wrapper">

        <?php echo $contents ?>
    </div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; monzflower <a href="#">Monz Flower</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <div class="tab-content">
            <div class="tab-pane" id="control-sidebar-home-tab">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
            </div>
        </div>
    </aside>
    <div class="control-sidebar-bg"></div>
    </div>


    <script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
    <script src="<?= base_url() ?>assets/dist/js/demo.js"></script>

    <script src="<?= base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.sidebar-menu').tree()
        })

        $(document).ready(function() {
            $('#table1').DataTable()
        })
    </script>
</body>

</html>