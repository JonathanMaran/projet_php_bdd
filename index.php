<?php
include 'config.php'; // connection base de données
include 'functions.php';

$articles = articleIndex($bdd);

echo '<a href="articleCreate.php" target="blank"><input type="button" value="Créer un nouvel article"></a>';
echo '<a href="category.php?name=loisirs" target="blank"><input type="button" value="Les articles de la catégorie \'loisirs\'"></a>';

foreach ($articles as $ligne) {
    echo '<h2><a href="article.php?id=' . $ligne['id'] . '"  target="blank">' . $ligne['title'] . ' </a></h2>';
    echo '<div><a href="articleModify.php?id=' . $ligne['id'] . '" target="blank"><input type="button" value="Modifier"></a><a href="articleDelete.php?id=' . $ligne['id'] . '" target="blank"><input type="button" value="Supprimer"></a></div>';
    echo '<p>' . nl2br($ligne['article']) . '<p>'; // nl2br garde le fait d'aller à la ligne depuis la base de données elle même
    echo '<p><i>' . ' article rédigé par ' . $ligne['first_name'] . ' ' . $ligne['last_name'] . ' ' . 'alias' . ' ' . $ligne['nickname'] . '</i><p>';
    echo '<p><i>' . 'Fin de publication le  ' . $ligne['end_of_publication_date'] . '</i><p>';
}
