// PROSEDUURIT
DELIMITER //
CREATE PROCEDURE GetAliasesByRegion()
    BEGIN
    SELECT title 
    FROM aliases 
    WHERE (region = regionName) 
    GROUP BY title_id 
    ORDER BY title 
    LIMIT 10;
    END //
DELIMITER ;

DELIMITER // 
CREATE PROCEDURE GetNamesByProfession()
    BEGIN
    SELECT name_
    FROM names_ 
    INNER JOIN name_worked_as
    ON names_.name_id = name_worked_as.name_id
    WHERE profession 
    LIKE '%" . $profession . "%'
    LIMIT 10;
    END //
DELIMITER ;

// INDEXIT:
CREATE INDEX Name_index ON names_ (name_);
CREATE INDEX Profession_index ON name_worked_as (profession); 
CREATE INDEX Name_id_index ON name_worked_as (name_id); 

CREATE INDEX Region_index ON aliases (region);
CREATE INDEX Title_genres_title_id_index ON title_genres (title_id);
CREATE INDEX Title_genres_title_id_index ON title_genres (region);

// NÄKYMÄT:
CREATE VIEW NumVotesByRating
AS
SELECT DISTINCT num_votes
FROM title_ratings
WHERE average_rating LIKE '%" . $average_rating . "%'
LIMIT 10;