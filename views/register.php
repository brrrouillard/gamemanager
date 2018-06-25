<h2>Inscription</h2>
<?php echo $notification; ?>
<form action="index.php?action=register" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Adresse e-mail</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">Cette adresse sera uniquement utilisée pour confirmer votre inscription.</small>
  </div>
  <div class="form-group">
    <label for="username">Pseudo</label>
    <input type="text" class="form-control" name="username" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="mdp">Mot de passe</label>
    <input type="password" class="form-control" name="mdp" placeholder="Minimum 8 caractères">
  </div>
  <input type="submit" class="btn btn-primary"></input>
</form>