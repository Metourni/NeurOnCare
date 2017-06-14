<?php

/**
 * Created by PhpStorm.
 * User: Noureddine
 * Date: 08/06/2017
 * Time: 14:48
 */
class DoctorController extends Controller
{

    function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->_model = new DoctorModel();
        session_start();
    }


    public function index()
    {
        if (isset($_SESSION['auth'])) {
            if ($_SESSION['auth'] === 'auth') {
                $this->view($this->_controller, $this->_action);
                $this->set('assets', ASSETS);
                $this->set('full_name', $_SESSION['nom'] . ' ' . $_SESSION['prenom']);
                $this->set('spec',$_SESSION['type']);
                $this->runView();
            } else {
                session_destroy();
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

    public function profile()
    {
        if (isset($_SESSION['auth'])) {
            if ($_SESSION['auth'] === 'auth') {
                $this->view($this->_controller, 'page-user');
                $this->set('assets', ASSETS);
                $this->set('full_name', $_SESSION['nom'] . ' ' . $_SESSION['prenom']);
                $this->set('spec',$_SESSION['type']);
                $this->runView();
            } else {
                session_destroy();
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

    public function listpat()
    {
        //$this->_model->
        if (isset($_SESSION['auth'])) {
            if ($_SESSION['auth'] === 'auth') {
                $res = $this->_model->gatAllPat($_SESSION['id']);
                //print_r('hola');
                $this->view($this->_controller, 'list-pat');
                $this->set('assets', ASSETS);
                $this->set('list', $res);
                $this->set('full_name', $_SESSION['nom'] . ' ' . $_SESSION['prenom']);
                $this->set('spec',$_SESSION['type']);
                $this->runView();
            } else {
                session_destroy();
                $this->view($this->_controller, 'login');
                $this->set('assets', ASSETS);
                $this->runView();
            }
        }else{
            $this->view($this->_controller, 'login');
            $this->set('assets', ASSETS);
            $this->runView();
        }
    }

    public function editord()
    {
        //$patient
        if (isset($_SESSION['auth'])) {
            if ($_SESSION['auth'] === 'auth') {
                $this->view($this->_controller, 'page-Modifier-Ordonance');
                $this->set('assets', ASSETS);
                $this->set('full_name', $_SESSION['nom'] . ' ' . $_SESSION['prenom']);
                $this->set('spec',$_SESSION['type']);
                $this->runView();
            } else {
                session_destroy();
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

    public function creatord()
    {
        //$patient
        if (isset($_SESSION['auth'])) {
            if ($_SESSION['auth'] === 'auth') {
                $this->view($this->_controller, 'page-Cree-ordonance');
                $this->set('assets', ASSETS);
                $this->set('full_name', $_SESSION['nom'] . ' ' . $_SESSION['prenom']);
                $this->set('spec',$_SESSION['type']);
                $this->runView();
            } else {
                session_destroy();
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

    public function map()
    {
        //$patient
        if (isset($_SESSION['auth'])) {
            if ($_SESSION['auth'] === 'auth') {
                $this->view($this->_controller, 'page-Map');
                $this->set('full_name', $_SESSION['nom'] . ' ' . $_SESSION['prenom']);
                $this->set('spec',$_SESSION['type']);
                $this->set('assets', ASSETS);
                $this->runView();
            } else {
                session_destroy();
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

    public function rdv()
    {
        //$patient
        if (isset($_SESSION['auth'])) {
            if ($_SESSION['auth'] === 'auth') {
                $this->view($this->_controller, 'page-calendar');
                $this->set('full_name', $_SESSION['nom'] . ' ' . $_SESSION['prenom']);
                $this->set('spec',$_SESSION['type']);
                $this->set('assets', ASSETS);
                $this->runView();
            } else {
                session_destroy();
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
        session_unset();
        session_destroy();
        $this->view($this->_controller, 'login');
        $this->set('assets', ASSETS);
        $this->runView();
    }


    public function login()
    {
        $this->view($this->_controller, $this->_action);
        $this->set('assets', ASSETS);


        if ($_SESSION['auth'] === 'auth') {
            $url = ASSETS . '/doctor/index';
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
                        $_SESSION['id'] = $res['id'];
                        $_SESSION['idEtablissement'] = $res['idEtablissement'];
                        $_SESSION['user'] = $res['user'];
                        $_SESSION['nom'] = $res['nom'];
                        $_SESSION['prenom'] = $res['prenom'];
                        $_SESSION['type']=$res['type'];
                        //$_SESSION['nom']=$res['nom'];
                        $url = ASSETS . '/doctor/index';
                        $time = time() + 60 * 60 * 24 * 1000;
                        setcookie('Metou', $res['id'], $time);
                        $this->redirect($url);
                    } else {
                        $this->set('error', 'Compte ' . $mail . ' n\'existe pas.' . print_r($res));
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