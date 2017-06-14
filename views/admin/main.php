<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>Sign In</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>

    <!-- CSS Files -->
    <link href="<?= $assets ?>/views/assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?= $assets ?>/views/assets/css/material-kit.css" rel="stylesheet"/>

</head>

<body class="signup-page">
<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">NeurOn Tech</a>
        </div>
    </div>
</nav>

<div class="wrapper">
    <div class="header header-filter"
         style="background-image: url('<?= $assets ?>/views/assets/img/city.jpg'); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <div class="card card-signup">
                        <form class="form" method="" action="GET">
                            <div class="header header-primary text-center" style="background: linear-gradient(160deg,#0ab1fc,#3f51b5)">
                                <h4>Sign In</h4>
                            </div>
                            <p class="text-divider"></p>
                            <div class="content">

                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
                                    <input type="text" class="form-control" placeholder="Email...">
                                </div>

                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
                                    <input type="password" placeholder="Password..." class="form-control"/>
                                </div>

                                <!-- If you want to add a checkbox to this form, uncomment this code

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="optionsCheckboxes" checked>
                                        Subscribe to newsletter
                                    </label>
                                </div> -->
                            </div>

                            <div class="footer text-center">

                                <input type='button' class='btn btn-previous btn-info btn-default btn-wd'
                                       name='previous' value='Previous'/>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <nav class="pull-left">

                </nav>
                <div class="copyright pull-right">
                    &copy; 2017, made with <a href="#" target="_blank">NeurOn</a>
                </div>
            </div>
        </footer>

    </div>

</div>


</body>
<!--   Core JS Files   -->
<script src="<?= $assets ?>/views/assets/js/jquery.min.js" type="text/javascript"></script>
<script src="<?= $assets ?>/views/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= $assets ?>/views/assets/js/material.min.js"></script>

<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="<?= $assets ?>/views/assets/js/nouislider.min.js" type="text/javascript"></script>

<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
<script src="<?= $assets ?>/views/assets/js/bootstrap-datepicker.js" type="text/javascript"></script>

<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
<script src="<?= $assets ?>/views/assets/js/material-kit.js" type="text/javascript"></script>

</html>
