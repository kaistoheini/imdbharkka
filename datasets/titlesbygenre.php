<?php
// HAETAAN GENREN MUKAAN ELOKUVIEN NIMET:

// Muodostetaan tietokantayhteys:
require_once('../db.php');
$genre = $_GET['genre'];
$dbcon = createDbConnection();
// Muodostetaan SQL-lause muuttujaan:
$sql = "SELECT `primary_title`
FROM `titles` INNER JOIN title_genres
ON titles.title_id = title_genres.title_id
WHERE genre LIKE '%" . $genre . "%'
LIMIT 10;";
// Ajetaan kysely kantaan:
$prepare = $dbcon->prepare($sql);
$prepare->execute();
// Tallennetaan vastaus muuttujaan:
$rows = $prepare->fetchAll();
$html = '<h1>' . $genre . '</h1>';
// Avataan ul-elementti
$html .= '<ul>';
// Loopataan tietokannasta saadut rivit läpi:
foreach($rows as $row) {
    // Tulostetaan jokaiselle riville li-elementti:
    $html .= '<li>' . $row['primary_title'] . '</li>';
}
$html .= '</ul>';
echo $html;