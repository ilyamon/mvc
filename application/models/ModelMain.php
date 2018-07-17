<?php

class ModelMain extends Model
{

    public function getContentOneNews($id)
    {
        $data = null;
        try {
            $data = $this->connect()->query("SELECT * FROM  articles WHERE id='$id'")->fetchAll(PDO::FETCH_OBJ);

        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        return $data;
    }


    public function insertUser($userData)
    {
        if ($this->connect()) {
            $password = md5($userData['password']);
            $sql = "INSERT INTO users(name, last_name, login, email, password)
              VALUES ( :name,  :lastName, :login, :email, :password)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(':name', $userData['firstName'], PDO::PARAM_STR);
            $stmt->bindParam(':lastName', $userData['lastName'], PDO::PARAM_STR);
            $stmt->bindParam(':login', $userData['login'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $userData['email'], PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            return $stmt->execute();
        }
    }

    public function registerUser(array $userData)
    {
        if (!isset($userData['password']) !== empty($userData['passwordConfirm'])) {
            $_SESSION['error_message'] = 'Inputted passwords not confirm!';
            return;
        }
        if (!isset($userData['login']) || empty($userData['login'])) {
            $_SESSION['error_message'] = 'Login can not be empty!';
            return;
        }
        if (!isset($userData['email']) || empty($userData['email'])) {
            $_SESSION['error_message'] = 'Email can not be empty!';
            return;
        }
        //TODO validation data before send to DB
        if ($this->insertUser($userData)) {
            $_SESSION['error_message'] = false;
        } else {
            $_SESSION['error_message'] = 'Register user not complete';
        }
    }

    public function search($string)
    {
        $search = $string['search_q'];
        $data = null;
        try {
            $sql = "SELECT *
                FROM articles
                WHERE title 
                LIKE '%".$search."%'
                ";
            $data = $this->connect()->query($sql)->fetchAll(PDO::FETCH_OBJ);

        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $data;
    }



    public function loginUser($data)
    {
        $userObj = $this->getUser($data['login']);
        if ($userObj) {
            if ($data['pass'] == $userObj->password) {

            } else {}
        } else {}
    }

    public function formLogin()
    {
        if ( ! isset($_POST['user']) || empty($_POST['user'])) {
            $_SESSION['error_message'] = 'Login can not by empty';
            return false;
        }
        if ( ! isset($_POST['pass']) || empty($_POST['pass'])) {
            $_SESSION['error_message'] = 'Password can not by empty';
            return false;
        }
        return $this->loginUser();
    }


    public function getUser($login, $password)
    {
        try {
            $sql = "SELECT * FROM users WHERE login = :login";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(':login', $login, PDO::PARAM_STR);

            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return false;
    }



    public function logoutAction()
    {
        session_destroy();
        header('Location: /main/login');
    }
}