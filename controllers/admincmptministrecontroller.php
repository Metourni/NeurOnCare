<?php

/**
 * Created by PhpStorm.
 * User: Noureddine
 * Date: 08/06/2017
 * Time: 14:48
 */
class AdminCmptMinistreController extends Controller
{

    function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->_model = new AdminCmptMinistreModel();
        session_start();
    }


    public function index()
    {
        if (isset($_SESSION['auth'])) {
            if ($_SESSION['auth'] === 'auth') {
                $url = ASSETS . '/admincmptministre/addcmpt';
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
        session_unset();
        session_destroy();
        $this->view($this->_controller, 'login');
        $this->set('assets', ASSETS);
        $this->runView();
    }

    public function addcmpt()
    {
        $this->view($this->_controller, $this->_action);
        $this->set('assets', ASSETS);

        if ($_SESSION['auth'] === 'auth') {

            if (isset($_POST['add'])) {
                if (isset($_POST['email']) && isset($_POST['password'])) {
                    $email = $_POST['email'];
                    $pass = $_POST['password'];
                    $etab = $_POST['location'];

                    $res = $this->_model->addCmpt($email, $pass, $etab);
                    if ($res) {
                        $this->set('success', ' utilisateur a ete ajoute');
                    } else {
                        $this->set('error', 'DB');
                    }

                } else {
                    $this->set('error', 'vérifier votre formulaire');
                }

            } else {

            }

        } else {
            $url = ASSETS . '/admincmptministre/login';
            $this->redirect($url);
        }
        $eatabl = $this->_model->getAllEtablissement();
        $this->set('etablissement',$eatabl);
        $this->runView();

    }

    public function login()
    {
        $this->view($this->_controller,$this->_action);
        $this->set('assets', ASSETS);


        if ($_SESSION['auth'] === 'auth') {
            $url = ASSETS.'/admincmptministre/index';
            $this->redirect($url);
        } else {
            if (isset($_POST['Sign-In'])) {
                if (isset($_POST['password']) && isset($_POST['email'])) {

                    $mail = $_POST['email'];
                    $pass = $_POST['password'];
                    $res = $this->_model->login($mail, $pass);
                    //$res =true;
                    if ($res) {
                        $_SESSION['auth'] = 'auth';
                        $url = ASSETS.'/admincmptministre/index';
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