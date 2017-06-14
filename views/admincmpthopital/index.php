<?php
/**
 * Created by PhpStorm.
 * User: Noureddine
 * Date: 08/06/2017
 * Time: 14:56
 */


if(isset($page)){
    if($page=='login'){
        include_once 'login.php';
    }else if ($page=='main'){
        include_once 'addcmptpat.php';
    }
}