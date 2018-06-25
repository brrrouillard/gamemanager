<h2>Liste des jeux</h2>
<table class="table table-striped table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Votes</th>
      <th scope="col"><a href="index.php?action=jeux&order=name">Name</a></th>
      <th scope="col"><a href="index.php?action=jeux&order=editor">Editor</a></th>
      <th scope="col"><a href="index.php?action=jeux&order=releaseYear">Release Year</a></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $count = 1;
    foreach ($tableauDeJeux as $jeu){
        echo '<tr>';
        echo '<th scope="row">' . $count . '</th>';
        echo '<td>' . $jeu->getNbVotes() . '</td>';
        echo '<td>' . $jeu->getName() . '</td>';
        echo '<td>' . $jeu->getEditor() . '</td>';
        if($jeu->getReleaseYear() == NULL){
            echo '<td><em>Inconnu </em></td>';
        }
        else{
            echo '<td>' . $jeu->getReleaseYear() . '</td>';
        }       
        echo '</tr>';
        $count++;
    }
    ?>
  </tbody>
</table>
<p>Vous désirez insérer un jeu ? Veuillez remplir le formulaire ci-dessous.</p>
<?php echo $notification; ?>
<form action="index.php?action=jeux" method="post">
  <div class="form-group">
    <label for="name">Nom du jeu</label>
    <input type="text" class="form-control" name="name">
  </div>
  <div class="form-group">
    <label for="editor">Editeur</label>
    <input type="text" class="form-control" name="editor" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="releaseYear"><em>Facultatif : Année de sortie (AA-MM-JJ).</em></label>
    <input type="text" class="form-control" name="releaseYear" aria-describedby="emailHelp">
  </div>
  <input type="submit" class="btn btn-primary"></input>
</form>