<?php
include('config.php');
include('functions.php');

echo '<div class="bouton">
  <p>
   <a href="index.php">Accueil</a>
 </p>
</div>';

$erreur_title = null;
$erreur_article = null;
$erreur_author = null;
$erreur_degree_of_importance = null;

$title = null;
$article = null;
$author = null;
$degree_of_importance = null;


if (!empty($_POST)) {
    if (empty($_POST['title'])) {
        $erreur_title = 'Veuillez définir votre titre ici'; // si la case civilité n'est pas sélectionné au premier SUBMIT, le message d'erreur demandera de cocher Monsieur ou Madame
    } else {
        $title = $_POST['title'];
    }
    if (empty($_POST['article'])) {
        $erreur_article = 'Veuillez écrire votre article ici';
    } else {
        $article = $_POST['article'];
    }
    if (empty($_POST['author'])) {
        $erreur_author = 'Veuillez écrire votre nom';
    } else {
        $author = $_POST['author'];
    }
    if (empty($_POST['degree_of_importance'])) {
        $erreur_degree_of_importance = 'Veuillez noter l\'importance';
    } else {
        $degree_of_importance = $_POST['degree_of_importance'];
    }

    articleCreate($bdd, $title, $article, $author, $degree_of_importance);
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Formulaire de contact</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<form action="articleCreate.php" method="post">
    <br>
    <div class="form-row">
        <div class="col">
            <label for="name">Titre :</label>
            <input type="text" class="form-control" name="title" placeholder="Titre de l'article"
                   value="<?php echo $title, $erreur_title ?>">
        </div>
    </div>

    <br>
    <div class="mb-3">
        <label for="name">Article :</label>
        <textarea class="form-control" id="validationTextarea" name="article" placeholder="Rédigez votre article..."
        ><?php echo $article, $erreur_article ?></textarea>
    </div>
    <br>
    <div class="form-row">
        <div class="col">
            <label for="name">ID de l'auteur :</label>
            <input type="text" class="form-control" name="author" placeholder="ID de l'auteur"
                   value="<?php echo $author, $erreur_author ?>">
        </div>
    </div>
    <br>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Degré d'importance de l'article:</label>
        <select class="form-control" name="degree_of_importance" id="exampleFormControlSelect1">
            <option>0</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Créer l'article</button>
    <br>


</form>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

</body>

</html>