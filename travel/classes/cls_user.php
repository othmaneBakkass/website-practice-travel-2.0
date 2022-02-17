<?php
include_once "dataAccess.php";

class User
{

    private $userEmail;
    private $userFirstName;
    private $userLastName;
    private $userPassword;
    private $userDateOfBirth;
    private $userDateAdded;

    function __construct($email, $firstname, $lastname, $password, $birth, $dateAdded)
    {
        $this->userEmail = $email;
        $this->userFirstName = $firstname;
        $this->userLastName = $lastname;
        $this->userPassword = $password;
        $this->userDateOfBirth = $birth;
        $this->userDateAdded = $dateAdded;
    }

    public function get_email()
    {
        return $this->userEmail;
    }

    public function set_email($email)
    {
        $this->userEmail = $email;
    }

    public function get_first_name()
    {
        return $this->userFirstName;
    }

    public function set_first_name($firstname)
    {
        $this->userFirstName = $firstname;
    }

    public function get_last_name()
    {
        return $this->userLastName;
    }

    public function set_last_name($lastname)
    {
        $this->userLastName = $lastname;
    }

    public function get_password()
    {
        return $this->userPassword;
    }

    public function set_password($password)
    {
        $this->userPassword = $password;
    }

    public function get_date_birth()
    {
        return $this->userDateOfBirth;
    }

    public function set_date_birth($birth)
    {
        $this->userDateOfBirth = $birth;
    }

    public function get_date_added()
    {
        return $this->userDateAdded;
    }


    public static function addUser($email, $password, $firstname, $lastname, $birth, $dateAdded)
    {
        $stmt = "INSERT INTO travelUser (firstName,lastName,userPassword,birth,email,userDate)  VALUES('$firstname','$lastname','$password','$birth','$email', '$dateAdded' )";
        $response = Dataaccess::report($stmt);
        if ($response <> 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkEmail($email)
    {
        $query = 'SELECT firstName FROM  travelUser WHERE email = :email';
        $stmt = Dataaccess::connextion()->prepare($query);
        $stmt->execute(array('email' => $email));
        $response = $stmt->rowCount();
        if ($response > 0) {
            return true;
        } else {
            return false;
        }
    }

    //check if user exists in the database
    public static function checkUser($email, $password)
    {
        //prepare the sql query
        $query = "SELECT * FROM travelUser WHERE email = '$email' AND userPassword = '$password'";

        //execute the query
        $stmt = Dataaccess::check($query);
        if ($stmt > 0) {
            //user exist
            return true;
        } else {
            return false;
        }
    }

    //get user information
    public static function getUserInfo($email, $password)
    {
        //prepare the sql query
        $query = "SELECT * FROM travelUser WHERE email = '$email' AND userPassword = '$password'";

        //execute the query
        $stmt = Dataaccess::selection($query);

        //store user information in array firstName,lastName,userPassword,birth,email,userDate
        $user = [];
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                array_push($user, $row);
            }
            $stmt->closeCursor();
            return $user;
        } else {
            return false;
        }
    }

    //get user ID
    public static function get_id($email)
    {
        //prepare the sql query
        $query = "SELECT * FROM travelUser WHERE email = '$email'";

        //execute the query
        $stmt = Dataaccess::selection($query);

        //store user information
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $userId = $row['idUser'];
            }
            $stmt->closeCursor();
            return $userId;
        } else {
            return false;
        }
    }
}
