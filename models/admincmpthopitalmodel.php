<?php

/**
 * Created by PhpStorm.
 * User: Noureddine
 * Date: 14/05/2017
 * Time: 11:28
 */
class AdminCmptHopitalModel extends Model
{


    public function login($user, $pass)
    {

        $db = $this::connection();
        if ($db !== false) {
            $username = $this->check($user);
            $password = hash('sha256', $pass);
            $statment = "SELECT * FROM AdminCmptHopital WHERE user ='$username' AND pass = '$password'";
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

    /*public function getAllmed()
    {
        $db = $this::connection();
        if ($db !== false) {

            $statment = "SELECT 
                              p.*,
                              m.id
                         FROM 
                            patient p
                         LEFT JOIN 
                            Affecter a
                         ON 
                            a.idPat=p.id
                         LEFT JOIN  
                            Medecin m
                         ON 
                            a.idMed = m.id
                         WHERE m.id ='$id'";

            //$statment = "SELECT * FROM patient";
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
    }*/
/*
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
    }*/


    public function addMed($email, $pass, $first_name, $last_name, $etab, $spec)
    {
        $db = $this::connection();
        if ($db !== false) {
            $pass = hash('sha256', $pass);
            if(empty($spec))
                $spec=NULL;
            $statment = "INSERT INTO Medecin VALUES ('NULL','$etab','$email','$pass','$first_name','$last_name','','$spec')";
            $result = $this->_cnx->query($statment);
            $this->close();
            if ($result === true) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getMedByEtabl($id)
    {
        $db = $this::connection();
        if ($db !== false) {
            $statment = "SELECT * FROM Medecin WHERE idEtablissement='$id'";
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

    public function addPat($email, $pass, $first_name, $last_name, $etab, $medcin, $date, $type)
    {
        $db = $this::connection();
        if ($db !== false) {
            $pass = hash('sha256', $pass);
            $statment = "INSERT INTO patient VALUES ('NULL','$etab','$type','$email','$pass','$first_name','$last_name','$date')";
            $result = $this->_cnx->query($statment);
            $this->close();
            if ($result === true) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function affecter($idmed,$idpat){
        $db = $this::connection();
        if ($db !== false) {
            $statment = "INSERT INTO Affecter VALUES ('NULL','$idmed','$idpat')";
            $result = $this->_cnx->query($statment);
            $this->close();
            if ($result===true) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }

    public function getIdByUserPat($userpat){
        $db = $this::connection();
        if ($db !== false) {
            $statment = "SELECT * FROM patient WHERE user='$userpat'";
            $result = $this->_cnx->query($statment);
            $this->close();
            if ($result->num_rows > 0) {
                $res= $result->fetch_assoc();
                return $res['id'];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}