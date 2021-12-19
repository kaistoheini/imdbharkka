<?php
// HAETAAN GENREN MUKAAN ELOKUVIEN NIMET:
require_once('../db.php');
$genre = $_GET['genre'];
$dbcon = createDbConnection();

$sql = "SELECT `primary_title`
FROM `titles` INNER JOIN title_genres
ON titles.title_id = title_genres.title_id
WHERE genre LIKE '%" . $genre . "%'
LIMIT 10;";

$prepare = $dbcon->prepare($sql);
$prepare->execute();
$rows = $prepare->fetchAll();
$html = '<h1>' . $genre . '</h1>';
$html .= '<ul>';
foreach($rows as $row) {
    $html .= '<li>' . $row['primary_title'] . '</li>';
}
$html .= '</ul>';
echo $html;