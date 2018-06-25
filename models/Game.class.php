<?php

class Game{

    private $_id;
    private $_name;
    private $_editor;
    private $_releaseYear;
    private $_nbVotes;

    public function __construct($id, $name, $editor, $releaseYear, $nbVotes){
        $this->_id = $id;
        $this->_name = $name;
        $this->_editor = $editor;
        $this->_releaseYear = $releaseYear;
        $this->_nbVotes = $nbVotes;
    }

    public function getID(){
        return $this->_id;
    }

    public function getName(){
        return $this->_name;
    }

    public function getEditor(){
        return $this->_editor;
    }

    public function getReleaseYear(){
        return $this->_releaseYear;
    }

    public function getNbVotes(){
        return $this->_nbVotes;
    }
    
    
}

?>