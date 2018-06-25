<h2>Chat en ligne</h2>

<p>Bienvenue sur le chat du site Game Manager</p>
<form action="index.php?action=chat" method="post">
  <div class="form-group">
    <label for="pseudo">Pseudo</label>
    <input type="text" class="form-control" name="pseudo" value="<?php if(!empty($_SESSION['pseudoUtilisateur'])){ echo $_SESSION['pseudoUtilisateur']; }?>" 
    <?php if(isset($_SESSION['authentifie']) AND $_SESSION['authentifie'] == true) { echo "readonly=\"readonly\""; } ?>>
  </div>
  <div class="form-group">
    <label for="editor">Message</label>
    <input type="text" class="form-control" name="message" aria-describedby="emailHelp">
  </div>
  <input type="submit" class="btn btn-primary"></input>
</form>
<div class="container">
<?php
foreach($tableauDeMessages as $message){
    echo '<p><strong>' . $message->getDateMessage() . ' : ' . $message->getPseudo() . '</strong> : ';  // Affichage de l'heure et du pseudo
    echo $message->getMessage() . '</p>'; // Affichage du message
}
?>
</div>