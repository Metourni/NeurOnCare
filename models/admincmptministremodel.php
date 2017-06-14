<?php

/**
 * Created by PhpStorm.
 * User: Noureddine
 * Date: 14/05/2017
 * Time: 11:28
 */
class AdminCmptMinistreModel extends Model
{


    public function login($user, $pass)
    {

        $db = $this::connection();
        if ($db !== false) {
            $username = $this->check($user);
            $password = hash('sha256', $pass);
            $statment = "SELECT * FROM AdminCmptMinistre WHERE user ='$username' AND pass = '$password'";
            $result = $this->_cnx->query($statment);
            $this->close();
            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function addCmpt($user,$pass,$locaion){
        $db = $this::connection();
        if ($db!=NULL) {
            //$username = $this->check($user);
            //$etablissement = $locaion;
            $password = hash('sha256', $pass);
            $statment = "INSERT INTO AdminCmptHopital VALUES (NULL,'$user','$password','$locaion')";
            $result = $this->_cnx->query($statment);
            $this->close();
            if ($result!==false) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }

    public function getAllEtablissement()
    {
        $db = $this::connection();
        if ($db !== false) {
            $statment = "SELECT * FROM Etablissement";
            $result = $this->_cnx->query($statment);
            $this->close();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_array()) {
                    $rows[] = $row;
                }
                return $rows;//$result->fetch_array();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}