<?php
include('config.php');
include('functions.php');

echo '<div class="bouton">
  <p>
   <a href="index.php">Accueil</a>
 </p>
</div>';

$articleid = $_GET['id'];


$article = articleView($bdd, $articleid);

echo '<h2>' . $article['title'] . '</h2>';
echo '<p>' . nl2br($article['article']) . '<p>'; // nl2br garde le fait d'aller à la ligne depuis la base de données elle même
echo '<p>' . $article['first_name'] . ' ' . $article['last_name'] . ' ' . 'alias' . ' ' . $article['nickname'] . '<p>';
echo '<p>' . 'Fin de publication le  ' . $article['end_of_publication_date'] . '<p>';


$commentaire = commentsArticle($bdd, $articleid);

if (!empty($commentaire)) {
    echo '<h2><i>Commentaire(s): </i></h2>';
}
foreach ($commentaire as $ligne) {
    echo '<p><strong><i>--------------- </i></strong></p>';
    echo '<p>' . $ligne['comment'] . '</p>';
    echo '<p>' . 'commentaire rédigé par' . ' ' . $ligne['first_name'] . ' ' . $ligne['last_name'] . ' ' . 'alias' . ' ' . $ligne['nickname'] . '</p>';
    echo '<p>' . 'publié le' . ' ' . $ligne['comment_date'] . '</p>';


}
