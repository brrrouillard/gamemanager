<?php

class Message{

    private $_id;
    private $_pseudo;
    private $_message;
    private $_dateMessage;

    public function __construct($id, $pseudo, $message, $dateMessage){
        $this->_id = $id;
        $this->pseudo = $pseudo;
        $this->_message = $message;
        $this->_dateMessage = $dateMessage;
    }

    public function getID(){
        return $this->_id;
    }

    public function getPseudo(){
        return $this->pseudo;
    }

    public function getMessage(){
        return $this->_message;
    }
    
    public function getDateMessage(){
        return $this->_dateMessage;
    }
    
}

?>