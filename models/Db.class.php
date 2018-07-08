<?php

class Db {
    private static $instance = null;
    private $_db;

    private function __construct()
    {
        try {
            $this->_db = new PDO('mysql:host=localhost;dbname=bdjeux;charset=utf8','root','root');
            $this->_db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$this->_db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        } 
		catch (PDOException $e) {
		    die('Erreur de connexion à la base de données : '.$e->getMessage());
        }
    }

	# Pattern Singleton pour avoir une seule connexion à la Db
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new Db();
        }
        return self::$instance;
    }
    
    /* ******
    START OF MEMBERS FUNCTIONS
    ****** */


    public function insert_user($email, $pseudo, $pwd){
        $query = 'INSERT INTO membres (pseudo, email, mdp, date_inscription) VALUES (:pseudo, :email, :pwd, NOW())';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':pseudo',$pseudo);
		$ps->bindValue(':pwd',$pwd);
        $ps->bindValue(':email',$email);
        
        return $ps->execute();
    }

    public function pseudo_exists($pseudo) {
		$query = 'SELECT * from membres WHERE lower(pseudo)=lower(:pseudo)';
		$ps = $this->_db->prepare($query);
		$ps->bindValue(':pseudo',$pseudo);
		$ps->execute();
		return ($ps->rowcount() != 0);
    }
    
    public function email_exists($email) {
		$query = 'SELECT * from membres WHERE email=:email';
		$ps = $this->_db->prepare($query);
		$ps->bindValue(':email',$email);
		$ps->execute();
		return ($ps->rowcount() != 0);
    }
    
    public function validate_user($pseudo,$mdp) {
		$query = 'SELECT mdp from membres WHERE pseudo=:pseudo';
		$ps = $this->_db->prepare($query);
		$ps->bindValue(':pseudo',$pseudo);
		$ps->execute();
		if ($ps->rowcount() == 0)
			return false;
		$correctPassword = $ps->fetch()->mdp;
		return $correctPassword == $mdp;
	}

    /* ******
    START OF GAMES FUNCTIONS
    ****** */

    public function insert_game($name, $editor){
        $query = 'INSERT INTO jeux (name, editor) VALUES (:name, :editor)';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':name', $name);
        $ps->bindValue('editor', $editor);

        return $ps->execute();
    }

    public function insert_game_date($name, $editor, $releaseYear){
        $query = 'INSERT INTO jeux (name, editor, release_year) VALUES (:name, :editor, :releaseYear)';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':name', $name);
        $ps->bindValue('editor', $editor);
        $ps->bindValue(':releaseYear', $releaseYear);

        return $ps->execute();
    }

    public function update_game_vote($name, $value){
        $query = 'INSERT INTO jeux (name, editor, release_year) VALUES (:name, :editor, :releaseYear)';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':name', $name);
        $ps->bindValue('editor', $editor);
        $ps->bindValue(':releaseYear', $releaseYear);

        return $ps->execute();
    }

    public function select_games_byname(){
        $query = 'SELECT * FROM jeux ORDER BY name ASC';
        $ps = $this->_db->prepare($query);
        
		$ps->execute(); 
		$tableau = array();
		while ($row = $ps->fetch()) {		
				$tableau[] = new Game($row->id,$row->name,$row->editor,$row->release_year, $row->nb_votes);
		}	
		# var_dump($tableau);
		return $tableau;
    }

    public function select_games_bydate(){
        $query = 'SELECT * FROM jeux ORDER BY release_year ASC';
        $ps = $this->_db->prepare($query);
        
		$ps->execute(); 
		$tableau = array();
		while ($row = $ps->fetch()) {		
				$tableau[] = new Game($row->id,$row->name,$row->editor,$row->release_year, $row->nb_votes);
		}	
		# var_dump($tableau);
		return $tableau;
    }

    public function select_games_byeditor(){
        $query = 'SELECT * FROM jeux ORDER BY editor ASC';
        $ps = $this->_db->prepare($query);
        
		$ps->execute(); 
		$tableau = array();
		while ($row = $ps->fetch()) {		
				$tableau[] = new Game($row->id,$row->name,$row->editor,$row->release_year, $row->nb_votes);
		}	
		# var_dump($tableau);
		return $tableau;
    }

    /* ******
    START OF CHAT FUNCTIONS
    ****** */

    public function select_messages(){
        $query = 'SELECT id, pseudo, message, DATE_FORMAT(date_message, \'%H:%i\') AS date FROM chat ORDER BY id DESC';
        $ps = $this->_db->prepare($query);        
		$ps->execute(); 
		$tableau = array();
		while ($row = $ps->fetch()) {		
				$tableau[] = new Message($row->id,$row->pseudo,$row->message, $row->date);
		}	
		# var_dump($tableau);
		return $tableau;
    }

    public function send_message($pseudo, $message){
        $query = 'INSERT INTO chat (pseudo, message, date_message) VALUES (:pseudo, :message, NOW())';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':pseudo', $pseudo);
        $ps->bindValue(':message', $message);

        return $ps->execute();
    }
    
}



?>