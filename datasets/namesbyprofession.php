<?php
// HAETAAN AMMATIN MUKAAN NIMIÄ:
require_once('../db.php');
$profession = $_GET['profession'];
$dbcon = createDbConnection();

$sql = "SELECT `name_`
FROM `names_` INNER JOIN name_worked_as
ON names_.name_id = name_worked_as.name_id
WHERE profession LIKE '%" . $profession . "%'
LIMIT 10;";

// $sql = "CALL GetNamesByProfession('" . $profession . "');";

$prepare = $dbcon->prepare($sql);
$prepare->execute();
$rows = $prepare->fetchAll();
$html = '<h1>Names by profession ' . $profession . '</h1>';
$html .= '<ul>';
foreach($rows as $row) {
    $html .= '<li>' . $row['name_'] . '</li>';
}
$html .= '</ul>';
echo $html;