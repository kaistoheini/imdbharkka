<?php
    require_once('utilities.php');
    $html = "<h2>Criteria</h2>";
    $html .= '<form action="GET">';
    $html .= createRegionDropdown();
    $html .= createGenreDropdown();
    $html .= createProfessionDropdown();

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
    
    echo $html;