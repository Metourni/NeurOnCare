<?php
/**
 * Created by PhpStorm.
 * User: Noureddine
 * Date: 15/05/2017
 * Time: 18:55
 */ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <link rel="apple-touch-icon" sizes="76x76" href="<?= $assets ?>/views/assets/img/favicon.ico">

    <title>Ajouter Compte</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <link rel="apple-touch-icon" sizes="76x76" href="<?= $assets ?>/views/assets/img/apple-icon.png"/>
    <link rel="icon" type="image/png" href="<?= $assets ?>/views/assets/img/favicon.png"/>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>

    <!-- CSS Files -->
    <link href="<?= $assets ?>/views/assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?= $assets ?>/views/assets/css/material-bootstrap-wizard.css" rel="stylesheet"/>

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?= $assets ?>/views/assets/css/demo.css" rel="stylesheet"/>
</head>

<body>

<div class="image-container set-full-height"
     style="background-image: url('<?= $assets ?>/views/assets/img/login/bg-login.jpg')">
    <!--   Creative Tim Branding   -->
    <a href="http://creative-tim.com">
        <div class="logo-container">
            <div class="logo">
                <img src="<?= $assets ?>/views/assets/img/login/new-logo2.png">
            </div>
            <!--<div class="brand">
                NeurOn Tech
            </div>-->
        </div>
    </a>


    <!--   Big container   -->
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <!--      Wizard container        -->
                <div class="wizard-container">
                    <div class="card wizard-card" data-color="blue" id="wizardProfile">
                        <form action="<?= $assets ?>/admincmpthopital/addcmptpat" method="post">
                            <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

                            <div class="wizard-header">
                                <h3 class="wizard-title">
                                    Ajouter Compte Patient
                                </h3>
                                <h5></h5>
                            </div>
                            <div class="wizard-navigation">
                                <ul>
                                    <li><a href="#account" data-toggle="tab">Account</a></li>
                                    <li><a href="#about" data-toggle="tab">About</a></li>
                                    <li><a href="#type" data-toggle="tab">Type</a></li>
                                </ul>
                            </div>

                            <div class="tab-content">
                                <div class="tab-pane" id="account">
                                    <div class="row">
                                        <h2 class="info-text">
                                            <?php
                                            if (isset($success)) {
                                                echo '<div style="color: green">' . $success . '</div>';
                                            } else if (isset($error)) {
                                                //echo '<div style="color: red">' . $error . '</div>';
                                            }
                                            ?>
                                        </h2>
                                        <div class="col-sm-4 col-sm-offset-1">
                                            <div class="picture-container">
                                                <div class="picture">
                                                    <img src="<?= $assets ?>/views/assets/img/default-avatar.png"
                                                         class="picture-src" id="wizardPicturePreview" title=""/>
                                                    <input type="file" id="wizard-picture">
                                                </div>
                                                <h6>Choose Picture</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">email</i>
													</span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Email
                                                        <small>(required)</small>
                                                    </label>
                                                    <input name="email" type="email" class="form-control">
                                                </div>
                                            </div>

                                            <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">lock_outline</i>
													</span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Password
                                                        <small>(required)</small>
                                                    </label>
                                                    <input name="password" type="password" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">account_balance</i>
													</span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Établissement
                                                        <small>(required)</small>
                                                    </label>
                                                    <select name="med" type="text" class="form-control">
                                                        <?php
                                                        foreach ($meds as $med) {
                                                            echo '<option value="' . $med['id'] . '">' . $med['nom'] . ' ' . $med['prenom'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="about">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4 class="info-text"> Plus d'information sur le patient </h4>
                                        </div>
                                        <div class="col-sm-7 col-sm-offset-1">
                                            <div class="form-group label-floating">
                                                <label class="control-label">First Name</label>
                                                <input name="first_name" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-sm-offset-1">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Last Name</label>
                                                <input name="last_name" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-sm-offset-1">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Date naisence</label>
                                                <input name="date" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="type">
                                    <h4 class="info-text"> Type de maladiée</h4>
                                    <div class="row">
                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="col-sm-4">
                                                <div class="choice" data-toggle="wizard-checkbox">
                                                    <input type="checkbox" name="ALZHAIMER" value="2">
                                                    <div class="icon">
                                                        <i class="fa fa-heartbeat"></i>
                                                    </div>
                                                    <h6>ALZHAIMER</h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="choice" data-toggle="wizard-checkbox">
                                                    <input type="checkbox" name="GROSSUES" value="4">
                                                    <div class="icon">
                                                        <i class="fa fa-heartbeat"></i>
                                                    </div>
                                                    <h6>GROSSUES</h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="choice" data-toggle="wizard-checkbox">
                                                    <input type="checkbox" name="DIAPITIC" value="3">
                                                    <div class="icon">
                                                        <i class="fa fa-heartbeat"></i>
                                                    </div>
                                                    <h6>DIAPITIC</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wizard-footer">
                                <div class="pull-right">
                                    <input type='submit' class='btn btn-fill btn-success btn-wd' name='add'
                                           value='Finish'/>
                                </div>
                                <div class="pull-right">
                                    <input type='submit' class='btn btn-fill btn-info btn-wd' name='add'
                                           value='Ajouter Medcin'/>
                                </div>


                                <a href="<?= $assets ?>/admincmpthopital/logout">
                                    <div class="pull-left">
                                        <input type='button' class='btn btn-fill btn-danger btn-wd' name='logout'
                                               value='logout'/>
                                    </div>
                                </a>

                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div> <!-- wizard container -->
            </div>
        </div><!-- end row -->
    </div> <!--  big container -->

    <div class="footer">
        <div class="container text-center">
            NeurON Tech
        </div>
    </div>
</div>

</body>
<!--   Core JS Files   -->
<script src="<?= $assets ?>/views/assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="<?= $assets ?>/views/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= $assets ?>/views/assets/js/jquery.bootstrap.js" type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="<?= $assets ?>/views/assets/js/material-bootstrap-wizard.js"></script>

<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
<script src="<?= $assets ?>/views/assets/js/jquery.validate.min.js"></script>

</html>

