// PROSEDUURIT:

DELIMITER $$
CREATE PROCEDURE GetAliasesByRegion()
    BEGIN
    SELECT title 
    FROM aliases 
    WHERE (region = regionName) 
    GROUP BY title_id 
    ORDER BY title 
    LIMIT 10;
    END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE TitlesWithOriginalTitle()
        BEGIN
        SELECT `title`
        FROM `aliases`
        WHERE (is_original_title = 1)
        LIMIT 20;
        END $$
DELIMITER ;

// INDEXIT:

CREATE INDEX Name_index ON names_ (name_);
CREATE INDEX Profession_index ON name_worked_as (profession); 
CREATE INDEX Name_id_index ON name_worked_as (name_id); 

CREATE INDEX Region_index ON aliases (region);
CREATE INDEX Title_genres_title_id_index ON title_genres (title_id);
CREATE INDEX Title_genres_title_id_index ON title_genres (region);

// NÄKYMÄT:

CREATE VIEW MoviesBy1984
AS
SELECT `primary_title`
FROM `titles`
WHERE start_year = 1984
LIMIT 10;