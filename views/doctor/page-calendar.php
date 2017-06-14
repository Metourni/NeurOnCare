<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="<?= $assets?>/views/doctor/css/main.css">
    <title>Fixer Render-Vous</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
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
                    <p>Dr. <?= $full_name ?></p>
                    <p class="designation"><?=$spec?></p>
                </div>
            </div>
            <!-- Sidebar Menu-->
            <ul class="sidebar-menu">
                <li><a href="<?= $assets?>/doctor/index"><i class="fa fa-dashboard"></i><span>Home</span></a></li>
                <li><a href="<?= $assets?>/doctor/profile"><i class="fa fa-edit"></i><span>Mon compte</span></a></li>
                <li class="active"><a href="<?= $assets?>/doctor/listpat"><i class="fa fa-th-list"></i><span>Liste des patients</span></a></li>

            </ul>
        </section>
    </aside>

    <div class="content-wrapper">
        <div class="page-title">
            <div>
                <h1><i class="fa fa-calendar"></i> RDV</h1>
                <p>Fixer un Rendez vous</p>
            </div>
            <div>
                <ul class="breadcrumb">
                    <li><i class="fa fa-home fa-lg"></i></li>
                    <li><a href="#">Fixer un Rendez vous</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card row">
                    <div class="col-md-3">
                        <div id="external-events">
                            <h4 class="mb-20">Drop une RDV</h4>
                            <div class="fc-event">Control</div>
                            <div class="fc-event">Mis a jour de ordannce</div>
                            <div class="fc-event">Test</div>

                        </div>
                    </div>
                    <div class="col-md-9">
                        <div id="calendar"></div>
                        <br>
                        <button class="btn btn-primary" type="button"><i
                                    class="fa fa-fw fa-lg fa-check-circle"></i> Save
                        </button>
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
<script type="text/javascript">
    $(document).ready(function () {

        $('#external-events .fc-event').each(function () {

            // store data so the calendar knows to render an event upon drop
            $(this).data('event', {
                title: $.trim($(this).text()), // use the element's text as the event title
                stick: true // maintain when user navigates (see docs on the renderEvent method)
            });

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });

        });

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar
            drop: function () {
                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }
            }
        });


    });
</script>
</body>
</html>