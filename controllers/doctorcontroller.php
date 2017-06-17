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
                $this->set('spec', $_SESSION['type']);
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
                $this->set('user', $_SESSION['user']);
                $this->set('first_name', $_SESSION['nom']);
                $this->set('last_name', $_SESSION['prenom']);
                $this->set('home_phone', $_SESSION['home_phone']);
                $this->set('adress', $_SESSION['adress']);
                $this->set('mobil', $_SESSION['mobil']);
                $this->set('spec', $_SESSION['type']);
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
                $this->set('spec', $_SESSION['type']);
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

    public function editord()
    {
        //$patient
        if (isset($_SESSION['auth'])) {
            if ($_SESSION['auth'] === 'auth') {
                $this->view($this->_controller, 'page-Modifier-Ordonance');
                $this->set('assets', ASSETS);
                $this->set('full_name', $_SESSION['nom'] . ' ' . $_SESSION['prenom']);
                $this->set('spec', $_SESSION['type']);
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
                $this->set('spec', $_SESSION['type']);
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
                $this->set('spec', $_SESSION['type']);
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
                $this->set('spec', $_SESSION['type']);
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
                        $_SESSION['type'] = $res['type'];
                        $_SESSION['home_phone'] = $res['home_phone'];
                        $_SESSION['adress'] = $res['adress'];
                        $_SESSION['mobil'] = $res['mobil'];

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

    public function ajaxUpdateProfile()
    {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $mobil = $_POST['mobil'];
        $address = $_POST['address'];
        $home_phone = $_POST['home_phone'];
        $res = $this->_model->updateProfile($_SESSION['id'], $first_name, $last_name, $email, $mobil, $address, $home_phone);

        if ($res)
            echo json_encode(["repense" => "OK"]);
        else
            echo json_encode(["repense" => "failed"]);
    }



    //=================
    //      RDV
    //=================

    public function ajaxAddCalender()
    {
        $idMed = $_SESSION['id'];
        $idPat = $_POST['idpatient'];
        $title = $_POST['title'];
        $startdate = $_POST['startdate'] . '+' . $_POST['zone'];
        $enddate = $startdate;
        $allDay = false;//$_POST[''];

        $res = $this->_model->setRDV($idMed, $idPat, $title, $startdate, $enddate, $allDay);
        if ($res !== false)
            echo json_encode(["status" => "success", 'eventid' => $res]);
        else
            echo json_encode(["status" => "failed"]);
        //echo json_encode(["status"=>"success"]);
    }

    public function ajaxCalenderUpdateTitle(){
        $eventid=$_POST['eventid'];
        $title=$_POST['title'];
        $res = $this->_model->updateRDVTitle($eventid, $title);
        if ($res !== false)
            echo json_encode(["status" => "success", 'eventid' => $res]);
        else
            echo json_encode(["status" => "failed"]);
    }

    public function ajaxCalenderGetAllEvent(){
        $idMed=$_SESSION['id'];
        $idPat=$_POST['idpat'];

        $events = $this->_model->getRDVs($idMed,$idPat);
        $response=array();
        foreach ($events as $event){
            $temp=array();
            $temp['id'] = $event['idRDV'];
            $temp['title'] = $event['title'];
            $temp['start'] = $event['startdate'];
            $temp['end'] = $event['enddate'];
            $allday = ($event['allDay'] == "true") ? true : false;
            $temp['allDay'] = $allday;

            array_push($response, $temp);
        }

        echo json_encode($response);

    }
    public function ajaxCalenderDeleteEvent(){
        $idEvent = $_POST['eventid'];
        $res = $this->_model->deleteRDV($idEvent);
        if($res)
            echo json_encode(array('status'=>'success'));
        else
            echo json_encode(array('status'=>'failed'));
    }

    //=================
    //    END RDV
    //=================


}