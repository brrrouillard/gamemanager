<?php

class RegisterController{

    private $_db;
    
    public function __construct($db){
        $this->_db = $db;

    }

    public function run(){
        $notification = '';
        if (empty($_POST)) { // L'utilisateur n'a encore rien rempli
            $notification = 'Veuillez remplir le formulaire.';
            require_once(VIEW_PATH . 'register.php');           
        }

        else if($this->_db->pseudo_exists($_POST['username'])){
            $notification = "Ce nom d'utilisateur est déjà enregistré.";
            require_once(VIEW_PATH . 'register.php');   
        }

        else if($this->_db->email_exists($_POST['email'])){
            $notification = "Cette adresse e-mail est déjà enregistrée.";
            require_once(VIEW_PATH . 'register.php');   
        }

        else {  // Si tout a été rempli
            $this->_db->insert_user($_POST['email'], $_POST['username'], $_POST['mdp']);   
            echo "Inscription réussie ! <br>Veuillez attendre qu'un administrateur valide votre compte.";
        }

        $notification = '<h5>' . $notification . '</h5>';

    }
}

?>