<?php

class ChatController{

    private $_db;
    
    public function __construct($db){
        $this->_db = $db;

    }

    public function run(){
        
        if(!empty($_POST['pseudo']) && !empty($_POST['message'])){
            $this->_db->send_message($_POST['pseudo'], $_POST['message']);
        }
        
        $tableauDeMessages = $this->_db->select_messages();
        require_once(VIEW_PATH . 'chat.php');
    }
}

?>