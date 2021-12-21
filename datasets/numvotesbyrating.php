<?php
// HAETAAN TIETYN LUOKITUKSEN MUKAAN, KUINKA PALJON ELOKUVA ON SAANUT ÄÄNIÄ:
require_once('../db.php');
$average_rating = $_GET['average_rating'];
$dbcon = createDbConnection();

$sql = "SELECT * FROM `NumVotesByRating`";

$prepare = $dbcon->prepare($sql);
$prepare->execute();
$rows = $prepare->fetchAll();
$html = '<h1>Num votes by average rating ' . $average_rating . '</h1>';
$html .= '<ul>';
foreach($rows as $row) {
    $html .= '<li>' . $row['average_rating'] . '</li>';
}
$html .= '</ul>';
echo $html;