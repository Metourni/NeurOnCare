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
            } else {
                return false;
            }
        } else {
            return false;
        }
    }



    //=================
    //      RDV
    //=================
    public function getRDVs($idMed,$idPat)
    {
        $db = $this::connection();
        if ($db !== false) {
            $statment = "SELECT * 
                         FROM RDV
                         WHERE idMed='$idMed' AND  idPat='$idPat'";
            $result = $this->_cnx->query($statment);
            $this->close();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_array()) {
                    $rows[] = $row;
                }
                return $rows;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }

    public function setRDV($idMed, $idPat, $title, $startdate, $enddate, $allDay)
    {
        $db = $this::connection();
        if ($db !== false) {
            $statment = "INSERT 
                         INTO RDV
                         VALUES (NULL,'$idMed','$idPat','$title','$startdate','$enddate','$allDay')";
            $result = $this->_cnx->query($statment);
            $lastid = mysqli_insert_id($this->_cnx);
            $this->close();
            if ($result === true) {
                return $lastid;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }

    public function updateRDVTitle($id, $title)
    {
        $db = $this::connection();
        if ($db !== false) {
            $statment = "UPDATE RDV 
                         SET title = '$title'
                         WHERE idRDV='$id'
            ";
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

    public function deleteRDV($id){
        $db = $this::connection();
        if ($db !== false) {
            $statment = "DELETE FROM RDV 
                         WHERE idRDV='$id'
            ";
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

    //=================
    //
    //=================



    public function getOrd($id)
    {

    }

    public function updateProfile($id, $first_name, $last_name, $email, $mobil, $address, $home_phone)
    {
        $db = $this::connection();
        if ($db !== false) {
            $statment = "UPDATE Medecin 
                         SET user='$email',nom='$first_name',prenom='$last_name',home_phone='$home_phone',adress='$address',mobil='$mobil'
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

}