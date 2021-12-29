<?php
// HAETAAN TIETYN LUOKITUKSEN MUKAAN, KUINKA PALJON ELOKUVA ON SAANUT ÄÄNIÄ:
require_once('../db.php');
$average_rating = $_GET['average_rating'];
$dbcon = createDbConnection();

$sql = "SELECT DISTINCT num_votes, primary_title
FROM title_ratings, titles
WHERE average_rating LIKE '%" . $average_rating . "%'
AND title_ratings.title_id = titles.title_id
LIMIT 25;";

$prepare = $dbcon->prepare($sql);
$prepare->execute();
$rows = $prepare->fetchAll();
$html = '<h1>Movie and amount of votes by average rating: ' . $average_rating . '</h1>';
$html .= '<ul>';
foreach($rows as $row) {
    $html .= '<li>' . '<b>Movie name: </b>' . $row['primary_title'] . ' ' . '</li>';
    $html .= '<p>' . '<b>Amount of votes: </b>' . $row['num_votes'] . '</p>';
}
$html .= '</ul>';
echo $html;