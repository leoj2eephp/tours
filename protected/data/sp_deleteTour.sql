DELIMITER //
CREATE PROCEDURE deleteTour(p_id INT)
BEGIN
    
    DECLARE thisId INT;
    DECLARE nextId INT;
    
	SET nextId = p_id;
	
	WHILE nextId IS NOT NULL DO
		SELECT id, tour_id FROM tour
		WHERE id = nextId
		INTO thisId, nextId;
		
		DELETE FROM tour WHERE id = thisId;
    END WHILE;
    
END
//