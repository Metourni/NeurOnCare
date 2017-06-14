<?php
/**
 * Created by PhpStorm.
 * User: Noureddine
 * Date: 14/05/2017
 * Time: 14:27
 */

/** Check if environment is development and display errors **/

function setReporting()
{
    /*
    if (DEVELOPMENT_ENVIRONMENT == true) {
        error_reporting(E_ALL);
        ini_set('display_errors', 'On');
    } else {
        error_reporting(E_ALL);
        ini_set('display_errors', 'Off');
        ini_set('log_errors', 'On');
        ini_set('error_log', ROOT . DS . 'tmp' . DS . 'logs' . DS . 'error.log');
    }
    */
}

/** Check for Magic Quotes and remove them **/

function stripSlashesDeep($value)
{
    $value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
    return $value;
}

function removeMagicQuotes()
{
    if (get_magic_quotes_gpc()) {
        $_GET = stripSlashesDeep($_GET);
        $_POST = stripSlashesDeep($_POST);
        $_COOKIE = stripSlashesDeep($_COOKIE);
    }
}

/** Check register globals and remove them **/

function unregisterGlobals()
{
    if (ini_get('register_globals')) {
        $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
        foreach ($array as $value) {
            foreach ($GLOBALS[$value] as $key => $var) {
                if ($var === $GLOBALS[$key]) {
                    unset($GLOBALS[$key]);// Détruit une variable
                }
            }
        }
    }
}


/** Main Call Function **/

function callHook()
{
    global $url;

    $urlArray = array();

    // url : controller/method/request
    $urlArray = explode("/", $url);

    $controller = $urlArray[0];//parametre 1 : Controller.
    array_shift($urlArray);//array_shift — >Dépile un élément au début d'un tableau

    $methode = $urlArray[0];//parametre 2 : method. ex:getPatients
    array_shift($urlArray);//array_shift — >Dépile un élément au début d'un tableau

    $queryString = $urlArray;//parmetre 3 : request. ex: id=1&&name=meto

    $controllerName = $controller; //Exemple user
    $controller = ucwords($controller); //ucwords — Met en majuscule la première lettre de tous les mots

    /*------ Model --------*/
    //$modelName = $controller.'Model'; // UserModel.
    //$model = new $modelName();//Objet. UserModel();
    /*------ Model -------*/

    $controller .= 'Controller';//Exemple UserController

    $dispatch = new $controller($controllerName, $methode);//$UserController(user,getPatients) ???????
    //$dispatch = new MainController('main', 'main');
    //Creation d'obj de controller.

    if ((int)method_exists($controller, $methode)) {
        //method_exists — Vérifie si la méthode existe pour une classe
        //bool method_exists ( mixed $object , string $method_name )

        call_user_func_array(array($dispatch, $methode), $queryString);
        //Appelle une fonction de rappel avec les paramètres rassemblés en tableau
        //$dispatch ->Controller
        //$methode  -> methode dans la class
        //$queryString ->Parameters ..


    } else {
        /* Error Generation Code */
        /* 404 Page not found */
        echo '<h1>404</h1>';
    }
}

/** Autoload any classes that are required **/

function __autoload($className)
{
    // require_once('../models/usermodel');
    if (file_exists(ROOT . '/views/' . strtolower($className) . '.class.php')) {
        require_once(ROOT . '/views/' . strtolower($className) . '.class.php');
    } else if (file_exists(ROOT . '/controllers/' . strtolower($className) . '.php')) {
        require_once(ROOT . '/controllers/' . strtolower($className) . '.php');
    } else if (file_exists(ROOT . '/models/' . strtolower($className) . '.php')) {
        require_once(ROOT . '/models/' . strtolower($className) . '.php');
    } else {
        require_once(ROOT . '/controllers/maincontroller.php');

    }
}


setReporting();
removeMagicQuotes();
unregisterGlobals();

callHook();

