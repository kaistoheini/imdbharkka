<?php
    require_once('utilities.php');
    // Hakukriteerit:
    $html = "<h2>Criteria</h2>";
    $html .= '<form action="GET">';
    // Region-pudotusvalikko:
    $html .= '<h3>Aliases by region</h3><br>';
    $html .= createRegionDropdown();
    // Genre-pudotusvalikko:
    $html .= '<h3>Titles by genre</h3><br>';
    $html .= createGenreDropdown();
    // Profession-pudotusvalikko:
    $html .= '<h3>Names by profession</h3><br>';
    $html .= createProfessionDropdown();
    // Average rating -pudotusvalikko:
    $html .= '<h3>Num votes by average rating</h3><br>';
    $html .= createRatingDropdown();
    // Loopataan läpi tiedostot datasets-hakemistosta:
    $path = 'datasets';
    if ($handle = opendir($path)) {
        while (false !== ($file = readdir($handle))) {
            if ('.' === $file) continue;
            if ('..' === $file) continue;
            
            $html .= '<div><input type="submit" value="' . 
            basename($file, ".php") . '" formaction="' . $path 
            . "/" . $file . '"></div>';
        }
        closedir($handle);
    }
    $html .= '</form>';
    // Luodaan painike, joka lähettää lomakkeen käsiteltävänä olevalle tiedostolle:
    echo $html;