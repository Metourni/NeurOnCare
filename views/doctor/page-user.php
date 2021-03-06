<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="<?= $assets?>/views/doctor/css/main.css">
    <title>Compte</title>
</head>
<body class="sidebar-mini fixed">
<div class="wrapper">
    <!-- Navbar-->
    <header class="main-header hidden-print"><a class="logo" href="<?= $assets?>/doctor/index">NeurON</a>
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
            <!-- Navbar Right Menu-->
            <div class="navbar-custom-menu">
                <ul class="top-nav">
                    <!--Notification Menu-->
                    <li class="dropdown notification-menu"><a class="dropdown-toggle" href="#" data-toggle="dropdown"
                                                              aria-expanded="false"><i
                            class="fa fa-bell-o fa-lg"></i></a>
                        <ul class="dropdown-menu">
                            <li class="not-head">You have 4 new notifications.</li>
                            <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span
                                    class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i
                                    class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                <div class="media-body"><span class="block">Lisa sent you a mail</span><span
                                        class="text-muted block">2min ago</span></div>
                            </a></li>
                            <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span
                                    class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i
                                    class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                                <div class="media-body"><span class="block">Server Not Working</span><span
                                        class="text-muted block">2min ago</span></div>
                            </a></li>
                            <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span
                                    class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i
                                    class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                                <div class="media-body"><span class="block">Transaction xyz complete</span><span
                                        class="text-muted block">2min ago</span></div>
                            </a></li>
                            <li class="not-footer"><a href="#">See all notifications.</a></li>
                        </ul>
                    </li>
                    <!-- User Menu-->
                    <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button"
                                            aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i></a>
                        <ul class="dropdown-menu settings-menu">
                            <li><a href="<?= $assets?>/doctor/profile"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                            <li><a href="<?= $assets?>/doctor/profile"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                            <li><a href="<?= $assets?>/doctor/logout"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Side-Nav-->
    <aside class="main-sidebar hidden-print">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image"><img class="img-circle" src="<?= $assets?>/views/doctor/images/doctor4.jpg" alt="User Image"></div>
                <div class="pull-left info">
                    <p>Dr. <?=  $first_name?> <?=  $last_name?></p>
                    <p class="designation"><?=$spec?></p>
                </div>
            </div>
            <!-- Sidebar Menu-->
            <ul class="sidebar-menu">
                <li><a href="<?= $assets?>/doctor/index"><i class="fa fa-dashboard"></i><span>Home</span></a></li>
                <li class="active"><a href="<?= $assets?>/doctor/profile"><i class="fa fa-edit"></i><span>Mon compte</span></a></li>
                <li><a href="<?= $assets?>/doctor/listpat"><i class="fa fa-th-list"></i><span>Liste des patients</span></a></li>

            </ul>
        </section>
    </aside>


    <div class="content-wrapper">
        <div class="row user">
            <div class="col-md-12">
                <div class="profile">
                    <div class="info"><img class="user-img"
                                           src="<?= $assets?>/views/doctor/images/doctor4.jpg">
                        <h4>Dr. <?=  $first_name?> <?=  $last_name?></h4>
                        <p class="designation"><?=$spec?></p>
                    </div>
                    <div class="cover-image" style="background-image: url('<?= $assets?>/views/doctor/images/cover.jpg')"></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-0">
                    <ul class="nav nav-tabs nav-stacked user-tabs">
                        <li class="active"><a href="#user-settings" data-toggle="tab">Settings</a></li>
                        <li><a href="#user-pass" data-toggle="tab">Password</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane fade" id="user-pass">
                        <div class="card user-settings">
                            <h4 class="line-head">Settings</h4>
                            <form method="post" action="">
                                <div class="row">
                                    <div class="col-md-8 mb-20">
                                        <label>Ancien mot de passe</label>
                                        <input name="old_password"class="form-control" name="password-old" type="password">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row mb-20">
                                    <div class="col-md-4">
                                        <label>Nouveau mot de pass</label>
                                        <input name="new_password" class="form-control" name="password-new" type="password">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Nouveau mot de pass</label>
                                        <input name="new_password" class="form-control" name="password-new2" type="password">
                                    </div>
                                </div>
                                <div class="row mb-10">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary" type="button"><i
                                                class="fa fa-fw fa-lg fa-check-circle"></i> Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane active" id="user-settings">
                        <div class="card user-settings">
                            <h4 class="line-head">Settings</h4>
                            <form class="form-user" method="" action="">
                                <div class="row mb-20">
                                    <div class="col-md-4">
                                        <label>First Name</label>
                                        <input id="first_name" name="first_name" class="form-control" type="text" value="<?=$first_name?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Last Name</label>
                                        <input id="last_name"  name="last_name" class="form-control" type="text" value="<?=$last_name?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 mb-20">
                                        <label>Email</label>
                                        <input id="email" name="email" class="form-control" type="text" value="<?=$user?>">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-8 mb-20">
                                        <label>Address</label>
                                        <input id="address" name="address" class="form-control" type="text" value="<?=$adress?>">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-8 mb-20">
                                        <label>Mobile Number</label>
                                        <input id="mobil" name="mobil" class="form-control" type="text" value="<?=$mobil?>">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-8 mb-20">
                                        <label>Home Phone</label>
                                        <input id="home_phone" name="home_phone" class="form-control" type="text" value="<?=$home_phone?>">
                                    </div>
                                </div>
                                <div class="row mb-10">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary" id ="btn-save-user" type="button"><i
                                                class="fa fa-fw fa-lg fa-check-circle"></i> Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Javascripts-->
<script src="<?= $assets?>/views/doctor/js/jquery-2.1.4.min.js"></script>
<script src="<?= $assets?>/views/doctor/js/bootstrap.min.js"></script>
<script src="<?= $assets?>/views/doctor/js/plugins/pace.min.js"></script>
<script src="<?= $assets?>/views/doctor/js/main.js"></script>
<script src="<?= $assets?>/views/assets/ajaxquery/sendinfo.js"></script>
</body>
</html>
