<?php
    // Funktio, joka luo genre-pudotusvalikon:
    function createGenreDropdown() { 
        // Avataan tietokantayhteys:
        require_once('db.php'); 
        $dbcon = createDbConnection();
        // Muodostetaan SQL-lause:
        $sql = "SELECT DISTINCT genre FROM title_genres;";
        // Ajetaan SQL-lause kantaan:
        $prepare = $dbcon->prepare($sql); 
            $prepare->execute();
            $rows = $prepare->fetchAll(); 
            // Avataan select-elementti:
            $html = '<select name="genre">';
            // Loopataan läpi vastauksena saadut rivit:
            foreach($rows as $row){
                // Luodaan jokaiselle riville option-elementti:
                $html .= '<option>' . $row['genre'] . '</option>';  
            }
            // Suljetaan select-elementti:
            $html .= '</select>';
            // Palautetaan luotu html kutsujalle:
            return $html; 
    }
    // Funktio, joka luo region-pudotusvalikon:
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
    // Funktio, joka luo profession-pudotusvalikon:
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
    // Funktio, joka luo average_rating-pudotusvalikon:
    function createRatingDropdown() {
        require_once('db.php'); 
        $dbcon = createDbConnection();

        $sql = 'SELECT DISTINCT average_rating FROM title_ratings;';
        $prepare = $dbcon->prepare($sql); 
            $prepare->execute();
            $rows = $prepare->fetchAll(); 
            $html = '<select name="average_rating">';
            foreach($rows as $row){
                $html .= '<option>' . $row['average_rating'] . '</option>';  
            }
            $html .= '</select>';
            return $html; 
    }


