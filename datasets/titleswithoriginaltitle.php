<?php
// HAETAAN ELOKUVAT NIIDEN ALKUPERÄISTEN NIMIEN MUKAAN:
require_once('../db.php');
$db = createDbConnection();
$sql = "CALL TitlesWithOriginalTitle";

$prepare = $db->prepare($sql);
$prepare->execute();
$rows = $prepare->fetchAll();
$html = '<h1>Movies with original title</h1>';
$html .= '<ul>';

foreach($rows as $row){
    $html .= '<li>' . $row['title'] . '</li>';
}
$html .= '</ul>';

echo $html;