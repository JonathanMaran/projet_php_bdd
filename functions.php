<?php

function articleIndex(PDO $bdd)
{
    $query = $bdd->query('SELECT articles.*, authors.first_name, authors.last_name, authors.nickname
FROM articles
INNER JOIN authors ON author_id = authors.id
ORDER BY end_of_publication_date DESC LIMIT 10');

    $reponse = $query->fetchAll();

    return $reponse;
}

function articleView(PDO $bdd, int $articleid)
{
    $query = $bdd->query('SELECT articles.*, authors.first_name, authors.last_name, authors.nickname
FROM articles
INNER JOIN authors ON author_id = authors.id
WHERE articles.id = ' . $articleid . ' ');

    $reponse = $query->fetch();

    return $reponse;
}


function commentsArticle(PDO $bdd, int $articleid)
{
    $query = $bdd->query('SELECT comments.*, authors.first_name, authors.last_name, authors.nickname
FROM comments
INNER JOIN authors ON author_id = authors.id
WHERE comments.article_id = ' . $articleid . ' ');

    $reponse = $query->fetchAll();

    return $reponse;
}


function articleCreate(PDO $bdd,  $title,  $article,  $author_id, $degree_of_importance)
{
    $query = $bdd->prepare('INSERT INTO articles (title, article, publication_date,  author_id, degree_of_importance)
VALUES (:title, :article, NOW(), :author_id, :degree_of_importance)');
    $state = $query->execute(array(
        'title' => $title,
        'article' => $article,
        'author_id' => $author_id,
        'degree_of_importance' => $degree_of_importance,
    ));

    return $query;
}


function articleModify(PDO $bdd,  $title,  $article,  $author_id, $degree_of_importance, $articleid)
{
    $query = $bdd->prepare('UPDATE articles
SET title = :title,
    article = :article,
    author_id = :author_id,
    degree_of_importance= :degree_of_importance
WHERE articles.id =' . $articleid);

    $state = $query->execute(array(
        'title' => $title,
        'article' => $article,
        'author_id' => $author_id,
        'degree_of_importance' => $degree_of_importance
    ));
    return $query;
}


function articleDelete(PDO $bdd, $articleid)
{ $query = $bdd->query('DELETE FROM `articles` 
WHERE articles.id = ' . $articleid);

return $query;
}

function categoryArticle(PDO $bdd, $nomcategory)
{
    $query = $bdd->query('SELECT articles.*, categories.category_article, authors.first_name, authors.last_name, authors.nickname
FROM articles
INNER JOIN authors ON author_id = authors.id
INNER JOIN articles_has_categories ON articles.id = articles_has_categories.article_id
INNER JOIN categories ON articles_has_categories.category_id = categories.id
WHERE categories.category_article = "' . $nomcategory .  '"');

    $reponse = $query->fetchAll();

    return $reponse;

}




// FONCTION à UTILISER POUR VOIR LES AVANCEES ET DONC LES ERREURS
function debug($var)
{
    highlight_string("<?php\n" . var_export($var, true) . ";\n?>");
}

