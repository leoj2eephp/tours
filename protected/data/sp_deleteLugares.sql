DELIMITER //
CREATE PROCEDURE deleteLugares(p_id INT)
BEGIN
    
    DECLARE thisId INT;
    DECLARE nextId INT;
    
	SET nextId = p_id;
	
	WHILE nextId IS NOT NULL DO
		SELECT id, lugares_id FROM lugares
		WHERE id = nextId
		INTO thisId, nextId;
		
		DELETE FROM lugares WHERE id = thisId;
    END WHILE;
    
END
//