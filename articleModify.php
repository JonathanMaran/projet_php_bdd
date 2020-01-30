<?php
include('config.php');
include('functions.php');

echo '<div class="bouton">
  <p>
   <a href="index.php">Accueil</a>
 </p>
</div>';

$title = null;
$article = null;
$author = null;
$degree_of_importance = null;

$articleid = $_GET['id'];

if (!empty($_POST)) {
    if (!empty($_POST['title'])) {
        $title = $_POST['title'];
    }
    if (!empty($_POST['article'])) {
        $article = $_POST['article'];
    }
    if (!empty($_POST['author'])) {
        $author = $_POST['author'];
    }
    $articlemodify = articleModify($bdd, $title, $article, $author, $degree_of_importance, $articleid);
}


// Recuperation des données saisies dans les champs
$articleview = articleView($bdd, $articleid);


?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Formulaire de contact</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<form method="post">
    <br>
    <div class="form-row">
        <div class="col">
            <label for="name">Titre :</label>
            <input type="text" class="form-control" name="title" placeholder="Titre de l'article"
                   value="<?php echo $articleview['title'] ?>">
        </div>
    </div>

    <br>
    <div class="mb-3">
        <label for="name">Article :</label>
        <textarea class="form-control" id="validationTextarea" name="article" placeholder="Rédigez votre article..."
        ><?php echo $articleview['article'] ?></textarea>
    </div>
    <br>
    <div class="form-row">
        <div class="col">
            <label for="name">ID de l'auteur :</label>
            <input type="text" class="form-control" name="author" placeholder="ID de l'auteur"
                   value="<?php echo $articleview['author_id'] ?>">
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Modifier l'article</button>
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