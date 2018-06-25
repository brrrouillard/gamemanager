<h2>Connexion</h2>
<?php echo $notification; ?>
<form action="index.php?action=login" method="post">
  <div class="form-group">
    <label for="username">Pseudo</label>
    <input type="text" class="form-control" name="username" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="mdp">Mot de passe</label>
    <input type="password" class="form-control" name="password" placeholder="Minimum 8 caractères">
  </div>
  <input type="submit" class="btn btn-primary"></input>
</form>