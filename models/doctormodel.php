<?php

/**
 * Created by PhpStorm.
 * User: Noureddine
 * Date: 14/05/2017
 * Time: 11:28
 */
class DoctorModel extends Model
{


    public function login($user, $pass)
    {

        $db = $this::connection();
        if ($db !== false) {
            $username = $this->check($user);
            $password = hash('sha256', $pass);
            $statment = "SELECT * FROM Medecin WHERE user ='$username' AND pass = '$password'";
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

    public function gatAllPat($id)
    {
        $db = $this::connection();
        if ($db !== false) {

            $statment = "SELECT 
                              p.*,
                              m.id,
                              dm.maladie
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
                         LEFT JOIN 
                            DossierMedical dm
                         ON 
                            p.dossierMedical=dm.id
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
    }

    public function creatOrd($idMed, $dose)
    {
        $db = $this::connection();
        if ($db !== false) {
            $statment = "INSERT INTO Ordonnence(id, med, dose) VALUES (NULL,'" . $idMed . "','" . $dose . "')";
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

    public function editOrd($idMed, $dose, $idPat)
    {
        $db = $this::connection();
        if ($db !== false) {
            $statment = "INSERT INTO Ordonnence(id, med, dose) VALUES (NULL,'" . $idMed . "','" . $dose . "')";
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

    public function getPosition($id)
    {
        $db = $this::connection();
        if ($db !== false) {
            $statment = "SELECT * 
                         FROM position
                         WHERE id='$id'";
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

    public function getRDVs($id)
    {
        $db = $this::connection();
        if ($db !== false) {
            $statment = "SELECT * 
                         FROM rdv
                         WHERE id='$id'";
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

    public function setRDV($id, $rdv)
    {
        $db = $this::connection();
        if ($db !== false) {
            $statment = "INSERT 
                         INTO rdv
                         VALUES $rdv
                         WHERE id='$id'";
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

    public function getOrd($id)
    {

    }

}