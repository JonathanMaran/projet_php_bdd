<?php
include('config.php');
include('functions.php');

echo '<div class="bouton">
  <p>
   <a href="index.php">Accueil</a>
 </p>
</div>';

$articleid = $_GET['id'];
echo '<p> Voulez vous vraiment surpprimer l\'article ? </p>';
if (!empty($_POST)) {
    if ($_POST['supprimer'] == 'Oui') {
        articleDelete($bdd, $articleid);
    }
    header('Location: http://localhost/tests/projet_php_bdd/index.php');

}
?>

<form action="" method="post">
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="supprimer" id="inlineRadio1" value="Oui">
        <label class="form-check-label" for="inlineRadio1">Oui</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="supprimer" id="inlineRadio2" value="Non">
        <label class="form-check-label" for="inlineRadio2">Non</label>
    </div>
    <br>;
    <button type="submit" class="btn btn-primary">Valider</button>
</form>


