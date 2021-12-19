<?php
    // Funktio, joka luo genre-pudotusvalikon
    function createGenreDropdown() { 
        require_once('db.php'); 
        $dbcon = createDbConnection();

        $sql = "SELECT DISTINCT genre FROM title_genres;";
        $prepare = $dbcon->prepare($sql); 
            $prepare->execute();
            $rows = $prepare->fetchAll(); 
            $html = '<select name="genre">';
            foreach($rows as $row){
                $html .= '<option>' . $row['genre'] . '</option>';  
            }
            $html .= '</select>';
            return $html; 
    }
    // Funktio, joka luo region-pudotusvalikon
    function createRegionDropdown() {
        require_once('db.php'); 
        $dbcon = createDbConnection();

        $sql = 'SELECT DISTINCT region FROM aliases;';
        $prepare = $dbcon->prepare($sql); 
            $prepare->execute();
            $rows = $prepare->fetchAll(); 
            $html = '<select name="region">';
            foreach($rows as $row){
                $html .= '<option>' . $row['region'] . '</option>';  
            }
            $html .= '</select>';
            return $html; 
    }
    // Funktio, joka luo profession-pudotusvalikon
    function createProfessionDropdown() {
        require_once('db.php'); 
        $dbcon = createDbConnection();

        $sql = 'SELECT DISTINCT profession FROM name_worked_as;';
        $prepare = $dbcon->prepare($sql); 
            $prepare->execute();
            $rows = $prepare->fetchAll(); 
            $html = '<select name="profession">';
            foreach($rows as $row){
                $html .= '<option>' . $row['profession'] . '</option>';  
            }
            $html .= '</select>';
            return $html; 
    }


