<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="<?= $assets?>/views/doctor/css/main.css">
    <title>Localiser Patient</title>
</head>
<body class="sidebar-mini fixed">
<div class="wrapper">
    <!-- Navbar-->
    <header class="main-header hidden-print"><a class="logo" href="<?= $assets?>/views/doctor/index">NeurON</a>
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
                    <p>Dr. <?= $full_name ?></p>
                    <p class="designation"><?=$spec?></p>
                </div>
            </div>
            <!-- Sidebar Menu-->
            <ul class="sidebar-menu">
                <ul class="sidebar-menu">
                    <li><a href="<?= $assets?>/doctor/index"><i class="fa fa-dashboard"></i><span>Home</span></a></li>
                    <li><a href="<?= $assets?>/doctor/profile"><i class="fa fa-edit"></i><span>Mon compte</span></a></li>
                    <li class="active"><a href="<?= $assets?>/doctor/listpat"><i class="fa fa-th-list"></i><span>Liste des patients</span></a></li>

                </ul>

            </ul>
        </section>
    </aside>

    <div class="content-wrapper">
        <div class="page-title">
            <div>
                <h1><i class="fa fa-file-text-o"></i> Localisation</h1>
                <p>Localiser patient </p>
            </div>
            <div>
                <ul class="breadcrumb">
                    <li><i class="fa fa-home fa-lg"></i></li>
                    <li><a href="#">Localiser patient</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card row patinet">
                    <div class="col-md-3">
                        <div class="patient" style="text-align: center">
                            <div class="img-patient">
                                <img class="img-circle" style="width: 200px;
                                                               border: 0.16pc solid #00bbff;
                                                               box-shadow: 0 2px 5px 0
                                                               rgba(0, 0, 0, 0.14), 0 1px 5px 0
                                                               rgba(0, 0, 0, 0.12), 0 3px 1px -2px
                                                               rgba(0, 0, 0, 0.2)
                                                                "
                                     src="<?= $assets?>/views/doctor/images/pat.png">
                            </div>
                            <br>
                            <p><?php echo $_GET['nom'].' '.$_GET['prenom']?></p>
                            <p><?php echo $_GET['age']?></p>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card user-settings">
                            <h4 class="line-head">Localisation</h4>
                            <div class="googleMap" id="googleMap" style="width:100%;height:400px;"></div>
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
<script type="text/javascript" src="<?= $assets?>/views/doctor/js/plugins/moment.min.js"></script>
<script type="text/javascript" src="<?= $assets?>/views/doctor/js/plugins/jquery-ui.custom.min.js"></script>
<script type="text/javascript" src="<?= $assets?>/views/doctor/js/plugins/fullcalendar.min.js"></script>

<script>
    function initMap() {
        var location = {lat: 36.705027, lng: 3.172607};
        var map = new google.maps.Map(document.getElementById('googleMap'), {
            zoom: 13,
            center: location
        });
        var marker = new google.maps.Marker({
            position: location,
            map: map
        });


        var circ = new google.maps.Circle({
            'center':location,
            'clickable':true,
            'fillColor':"#00bbff",
            'fillOpacity':0.2,
            'map':map,
            'radius':1300,
            'strokeColor':'#0000A0',
            'strokeOpacity':'0.5'
        });
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZALIHGsrJVfLJJqmIX92IMnXuIKqBOjo&callback=initMap">
</script>
</body>
</html>