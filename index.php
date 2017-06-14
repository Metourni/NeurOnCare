<?php
/**
 * Created by PhpStorm.
 * User: Noureddine
 * Date: 14/05/2017
 * Time: 11:09
 */


/*Default url*/

define('ROOT', dirname(__FILE__));
define('ASSETS','/hopital');

if (!isset($_GET['url'])) {
    $url = 'admincmptministre/index';//default page
}
else{
    $url = $_GET['url'];
}


require_once 'router/load.php';


?>