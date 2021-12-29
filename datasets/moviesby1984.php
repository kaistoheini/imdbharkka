<?php
// HAETAAN ELOKUVAT VUODESTA 1984 ALKAEN:
require_once('../db.php');
$db = createDbConnection();

$sql = "SELECT * FROM `moviesby1984`"; 

$prepare = $db->prepare($sql);

$prepare->execute();

$rows = $prepare->fetchAll();
$html = '<h1>Movies with start year 1984</h1>';
$html .= '<ul>';

foreach($rows as $row){
    $html .= '<li>' . $row['primary_title'] . '</li>';
}
$html .= '</ul>';

echo $html;