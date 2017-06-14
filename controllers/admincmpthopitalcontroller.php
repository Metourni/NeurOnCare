<?php

/**
 * Created by PhpStorm.
 * User: Noureddine
 * Date: 08/06/2017
 * Time: 14:48
 */
class AdminCmptHopitalController extends Controller
{
    function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->_model = new AdminCmptHopitalModel();
        session_start();
    }


    public function index()
    {
        /*Afficher le login */
        if (isset($_SESSION['auth'])) {
            if ($_SESSION['auth'] === 'auth') {
                $url = ASSETS . '/admincmpthopital/addcmptmed';
                $this->redirect($url);
            } else {
                $this->view($this->_controller, 'login');
                $this->set('assets', ASSETS);
                $this->runView();
            }
        } else {
            $this->view($this->_controller, 'login');
            $this->set('assets', ASSETS);
            $this->runView();
        }
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        $this->view($this->_controller, 'login');
        $this->set('assets', ASSETS);
        $this->runView();
    }

    public function addcmptmed()
    {
        $this->view($this->_controller, $this->_action);
        $this->set('assets', ASSETS);

        if ($_SESSION['auth'] === 'auth') {
            //$eatabl = $this->_model->getAllEtablissement();
            //$this->set('etablissement',$eatabl);
            if (isset($_POST['add'])) {
                if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['first_name']) && isset($_POST['last_name'])) {
                    $email = $_POST['email'];
                    $pass = $_POST['password'];
                    $first_name = $_POST['first_name'];
                    $last_name = $_POST['last_name'];
                    $etab = $_SESSION['idEtablissement'];
                    if (isset($_POST['specialite']) && !empty($_POST['specialite']))
                        $spec = $_POST['specialite'];
                    else
                        $spec = NULL;

                    $res = $this->_model->addMed($email, $pass, $first_name, $last_name, $etab, $spec);
                    if ($res) {
                        $this->set('success', ' Utilisateur a ete ajoute');
                    } else {
                        $this->set('error', 'DB');
                    }

                } else {
                    $this->set('error', 'vérifier votre formulaire');
                }

            } else {

            }

        } else {
            $url = ASSETS . '/admincmpthopital/login';
            $this->redirect($url);
        }
        $this->runView();

    }

    public function addcmptpat()
    {
        $this->view($this->_controller, $this->_action);
        $this->set('assets', ASSETS);

        if ($_SESSION['auth'] === 'auth') {
            $med = $this->_model->getMedByEtabl($_SESSION['idEtablissement']);
            $this->set('meds', $med);

            if (isset($_POST['add'])) {
                if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['first_name']) && isset($_POST['last_name'])) {
                    if (isset($_POST['med']) && isset($_POST['date'])) {
                        if (isset($_POST['ALZHAIMER']) || isset($_POST['GROSSUES']) || isset($_POST['DIAPITIC'])) {
                            $email = $_POST['email'];
                            $pass = $_POST['password'];
                            $first_name = $_POST['first_name'];
                            $last_name = $_POST['last_name'];
                            $etab = $_SESSION['idEtablissement'];
                            $medcin=$_POST['med'];
                            $date=$_POST['date'];

                            if (isset($_POST['ALZHAIMER']) && !empty($_POST['ALZHAIMER']))
                                $type = $_POST['ALZHAIMER'];
                            else if (isset($_POST['GROSSUES']) && !empty($_POST['GROSSUES']))
                                $type = $_POST['GROSSUES'];
                            else if (isset($_POST['DIAPITIC']) && !empty($_POST['DIAPITIC']))
                                $type = $_POST['DIAPITIC'];
                            else
                                $type='2';

                            $res = $this->_model->addPat($email, $pass, $first_name, $last_name, $etab, $medcin,$date,$type);
                            if ($res!==false) {
                                $id=$this->_model->getIdByUserPat($email);
                                $res=$this->_model->affecter($medcin,$id);
                                if ($res!==false) {
                                    $this->set('success', ' Utilisateur a ete ajoute');
                                }else{
                                    $this->set('error', 'DB');
                                }

                            } else {
                                $this->set('error', 'DB'.$email.' '.$pass.' '.$first_name.' '.$last_name.' '.$etab.' '.$medcin.' '.$date.' '.$type);
                            }
                        }else{
                            $this->set('error', 'Il faut choisir une type');
                        }
                    } else {
                        $this->set('error', 'vérifier votre formulaire');
                    }

                } else {
                    $this->set('error', 'vérifier votre formulaire');
                }

            } else {

            }

        } else {
            $url = ASSETS . '/admincmpthopital/login';
            $this->redirect($url);
        }
        $this->runView();
    }


    public function login()
    {
        $this->view($this->_controller, $this->_action);
        $this->set('assets', ASSETS);


        if ($_SESSION['auth'] === 'auth') {
            $url = ASSETS . '/admincmpthopital/index';
            $this->redirect($url);
        } else {
            if (isset($_POST['Sign-In'])) {
                if (isset($_POST['password']) && isset($_POST['email'])) {

                    $mail = $_POST['email'];
                    $pass = $_POST['password'];
                    $res = $this->_model->login($mail, $pass);
                    //$res =true;
                    if ($res !== false) {
                        $_SESSION['auth'] = 'auth';
                        $_SESSION['idEtablissement'] = $res['idEtablissement'];
                        $url = ASSETS . '/admincmpthopital/addcmptmed';
                        $this->redirect($url);
                    } else {
                        $this->set('error', 'Compte ' . $mail . ' n\'existe pas.');
                    }
                } else {
                    $this->set('error', 'vérifier votre formulaire');
                }
            } else {
                /* Page login normal*/
            }
            $this->runView();
        }

    }


}