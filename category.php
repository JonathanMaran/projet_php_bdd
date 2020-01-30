<?php
include('config.php');
include('functions.php');

echo '<div class="bouton">
  <p>
   <a href="index.php">Accueil</a>
 </p>
</div>';


$nomcategory = $_GET['name'];

$category = categoryArticle($bdd, $nomcategory);

if(isset($category))
{
    echo '<h2> Voici la liste des articles faisant partie de la catégorie \'Loisirs\' </h2>';
}

foreach ($category as $ligne)
{

    echo '<p>' . ' * L\'article: ' . '<a href="article.php?id=' . $ligne['id'] . '"  target="blank">' . $ligne['title'] . ' </a></p>';
}