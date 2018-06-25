<?php

class BdController{
    
    private $_db;

    public function __construct($db){
        $this->_db = $db;
    }

    public function run(){
        $notification = '<em>';
        
        // Cette partie concerne l'enregistrement d'un nouveau jeu
        if (empty($_POST['name']) && empty($_POST['editor'])){
            $notification .= '';
        }
        elseif (!empty($_POST['name']) && empty($_POST['editor'])){
            $notification .= "Veuillez renseigner l'éditeur.";
        }
        elseif (empty($_POST['name']) && !empty($_POST['editor'])){
            $notification .= 'Veuillez renseigner le nom.';
        }
        elseif(!empty($_POST['name']) && !empty($_POST['editor']) && empty($_POST['releaseYear'])){
            $this->_db->insert_game($_POST['name'], $_POST['editor']);
        } // Si il a tout rempli sauf l'année
        
        else{ // Si l'année est également renseignée
            $this->_db->insert_game_date($_POST['name'], $_POST['editor'], $_POST['releaseYear']);
        }

        // Cette partie concerne l'affichage du tableau de jeux 

        if (!isset($_GET['order']) OR $_GET['order'] == 'name'){
            $tableauDeJeux = $this->_db->select_games_byname();
        }

        elseif ($_GET['order'] == 'releaseYear'){
            $tableauDeJeux = $this->_db->select_games_bydate();
        }

        elseif ($_GET['order'] == 'editor'){
            $tableauDeJeux = $this->_db->select_games_byeditor();
        }
        
        $notification .= '</em>';
        require_once(VIEW_PATH . 'bd.php');
    }
}

?>