<?php

class LoginController{

    private $_db;
    
    public function __construct($db){
        $this->_db = $db;

    }

    public function run(){
        $notification = '';

        if(!isset($_POST['username']) AND !isset($_POST['password'])){
            $notification = '';
        }

        elseif ($this->_db->validate_user($_POST['username'],$_POST['password'])){
            $notification = 'Connexion réussie !';
            $_SESSION['pseudoUtilisateur'] = $_POST['username'];
            $_SESSION['authentifie'] = true;
        }
        elseif (!$this->_db->validate_user($_POST['username'],$_POST['password'])){
            $notification = 'Pseudo ou mot de passe incorrect';
        }
        

        $notification = '<h5>' . $notification . '</h5>';

        require_once(VIEW_PATH . 'login.php');

    }
}

?>