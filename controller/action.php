<?php
define('ROOT_DIR', dirname(__FILE__));
define('ROOT_URL', substr($_SERVER['PHP_SELF'], 0, - (strlen($_SERVER['SCRIPT_FILENAME']) - strlen(ROOT_DIR))));
ini_set( 'error_reporting', E_ALL );
ini_set( 'display_errors', true );
ini_set('allow_url_include', 0);
date_default_timezone_set("Asia/Manila");
include ROOT_DIR. '/../system/constant.php';
session_start();
include ROOT_DIR. '/../system/config.php';




//initialize the settings

$DB_con = db_connect();

$action = new action($DB_con);

class action
{
    private $db;

    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }


//LOGIN CLASS
    public function loginSystem($username, $password) //login to owner of the system
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM tbl_admin WHERE username=:username LIMIT 1");
            $stmt->execute(array(':username' => $username));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
                if (password_verify($password, $row['password'])) {
                    if($row['status']=='Active' && $row['role']=='Owner'){ // for owner of the system
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['password'] = $row['password'];
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['firstname'] = $row['firstname'];
                        $_SESSION['middlename'] = $row['middlename'];
                        $_SESSION['lastname'] = $row['lastname'];
                        $_SESSION['declared'] = $row['password'];
                        $this->redirect('dashboard.php'); //redirect to owner page
                    }
                }


            } else {
                return false;
                //
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function loginOwner($username, $password) //login to client admin owner and staff
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM tbl_company_users WHERE username=:username LIMIT 1");
            $stmt->execute(array(':username' => $username));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        if ($stmt->rowCount() > 0) {
                            if (password_verify($password, $row['password'])) {
                                if($row['status']=='Active' && $row['role']=='Admin') { // for owner of the system
                                    $_SESSION['id'] = $row['id'];
                                    $_SESSION['company_name'] = $row['company_name'];
                                    $_SESSION['password'] = $row['password'];
                                    $_SESSION['username'] = $row['username'];
                                    $_SESSION['firstname'] = $row['firstname'];
                                    $_SESSION['middlename'] = $row['middlename'];
                                    $_SESSION['lastname'] = $row['lastname'];
                                    $_SESSION['declared'] = $row['password'];
                                    $_SESSION['contact'] = $row['contact'];
                                    $this->redirect('dashboard.php'); //redirect to owner page
                                }
                                else if ($row['status'] == 'Active' && $row['role'] == 'Staff') { //for those clients who brought the
                                        // system
                                        $_SESSION['company_name'] = $row['company_name'];
                                        $_SESSION['id'] = $row['id'];
                                        $_SESSION['password'] = $row['password'];
                                        $_SESSION['username'] = $row['username'];
                                        $_SESSION['firstname'] = $row['firstname'];
                                        $_SESSION['middlename'] = $row['middlename'];
                                        $_SESSION['lastname'] = $row['lastname'];
                                        $_SESSION['declared'] = $row['password'];
                                        $this->redirect('staff/dashboard.php'); //redirect to client page
                                    }
                                }
                    else {
                                return false;
                    }
                    return true;
                }
             else {
                return false;
                //
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function loginTechnician($username, $password) //login to technician.
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM tbl_company_users WHERE username=:username LIMIT 1");
            $stmt->execute(array(':username' => $username));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
                if (password_verify($password, $row['password'])) {
                    if($row['status']=='Active' && $row['role']=='Tech'){ // for owner of the system
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['password'] = $row['password'];
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['firstname'] = $row['firstname'];
                        $_SESSION['middlename'] = $row['middlename'];
                        $_SESSION['lastname'] = $row['lastname'];
                        $_SESSION['declared'] = $row['password'];
                        $this->redirect('dashboard.php'); //redirect to owner page
                    }
                }


            } else {
                return false;
                //
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function loginUser($username, $password) //login to user.
    {

        try {
            $stmt = $this->db->prepare("SELECT * FROM tbl_users WHERE username=:username LIMIT 1");
            $stmt->execute(array(':username' => $username));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
                if (password_verify($password, $row['password'])) {
                    if($row['status']=='Active'){ // for owner of the system
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['password'] = $row['password'];
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['firstname'] = $row['firstname'];
                        $_SESSION['middlename'] = $row['middlename'];
                        $_SESSION['lastname'] = $row['lastname'];
                        $_SESSION['declared'] = $row['password'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['contact'] = $row['contact'];
                        $this->redirect('dashboard.php'); //redirect to user page
                    }
                }
            } else {
                return false;
                // return false
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function is_loggedin()
    {
        if (isset($_SESSION['id'])) {
            return true;
        }
    }

    public function redirect($url)
    {
        header("Location: $url");
    }

    public function logout()
    {
        session_destroy();
        unset($_SESSION['id']);
        return true;
    }

}