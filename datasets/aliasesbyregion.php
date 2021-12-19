<?php
    // HAETAAN ALUEEN MUKAAN ELOKUVIEN NIMET:
    
    // Muodostetaan tietokantayhteys
    require_once('../db.php'); // Otetaan db.php-tiedosto käyttöön tässä tiedostossa
    // Luetaan region get-parametri muuttujaan
    $region = $_GET['region'];
    $dbcon = createDbConnection(); // Kutsutaan db.php-tiedostossa olevaa createDbConnection()-funktiota, joka avaa tietokantayhteden
    // Muodostetaan SQL-lause muuttujaan
    $sql = "CALL GetAliasesByRegion('" . $region . "');";
    // Ajetaan kysely kantaan
    $prepare = $dbcon->prepare($sql);
    $prepare->execute();
    // Tallennetaan vastaus muuttujaan
    $rows = $prepare->fetchAll();
    // Tulostetaan otsikko
    $html = '<h1>Aliases by region ' . $region . '</h1>';
    // Avataan ul-elementti
    $html .= '<ul>';
    // Looppataan tietokannasta saadut rivit läpi
    foreach($rows as $row) {
        // Tulostetaan jokaiselle riville li-elementti
        $html .= '<li>' . $row['title'] . '</li>';
    }
    $html .= '</ul>';
    echo $html;