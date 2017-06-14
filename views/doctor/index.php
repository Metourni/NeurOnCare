<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="<?=$assets?>/views/doctor/css/main.css">
    <title>Espace Medcin</title>
  </head>

  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <!-- Navbar-->
      <header class="main-header hidden-print"><a class="logo" href="<?= $assets ?>/doctor/index">NeurON</a>
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
          <!-- Navbar Right Menu-->
          <div class="navbar-custom-menu">
            <ul class="top-nav">
              <!--Notification Menu-->
              <li class="dropdown notification-menu"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell-o fa-lg"></i></a>
                <ul class="dropdown-menu">
                  <li class="not-head">You have 4 new notifications.</li>
                  <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                      <div class="media-body"><span class="block">Lisa sent you a mail</span><span class="text-muted block">2min ago</span></div></a></li>
                  <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                      <div class="media-body"><span class="block">Server Not Working</span><span class="text-muted block">2min ago</span></div></a></li>
                  <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                      <div class="media-body"><span class="block">Transaction xyz complete</span><span class="text-muted block">2min ago</span></div></a></li>
                  <li class="not-footer"><a href="#">See all notifications.</a></li>
                </ul>
              </li>
              <!-- User Menu-->
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu">
                  <li><a href="<?= $assets ?>/doctor/profile"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                  <li><a href="<?= $assets ?>/doctor/profile"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                  <li><a href="<?= $assets ?>/doctor/logout"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
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
            <div class="pull-left image"><img class="img-circle" src="<?= $assets ?>/views/doctor/images/doctor4.jpg" alt="User Image"></div>
            <div class="pull-left info">
              <p>Dr. <?= $full_name ?></p>
              <p class="designation"><?=$spec?></p>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
              <li class="active"><a href="<?= $assets ?>/doctor/index"><i class="fa fa-dashboard"></i><span>Home</span></a></li>
            <li><a href="<?= $assets?>/doctor/profile"><i class="fa fa-edit"></i><span>Mon compte</span></a></li>
            <li><a href="<?= $assets?>/doctor/listpat"><i class="fa fa-th-list"></i><span>Liste des patients</span></a></li>

          </ul>
        </section>
      </aside>


      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-dashboard"></i> Acceil</h1>
            <p>Votre propre espace</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Acceil</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <h3 class="card-title">Commencer</h3>
                <p>Pour plus d'information sur l'utilisation d'application vous povez consulter la documentation de l'appllication</p>
                <p></p>
              <p class="mt-40 mb-20">
                <a class="btn btn-primary icon-btn mr-10" href="#" target="_blank">
                  <i class="fa fa-file"></i>Docs
                </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Javascripts-->
    <script src="<?= $assets ?>/views/doctor/js/jquery-2.1.4.min.js"></script>
    <script src="<?= $assets ?>/views/doctor/js/bootstrap.min.js"></script>
    <script src="<?= $assets ?>/views/doctor/js/plugins/pace.min.js"></script>
    <script src="<?= $assets ?>/views/doctor/js/main.js"></script>
  </body>
</html>