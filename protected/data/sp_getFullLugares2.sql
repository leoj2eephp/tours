DROP PROCEDURE IF EXISTS getFullLugares2;
DELIMITER $
CREATE PROCEDURE `getFullLugares2`(p_id INT)
BEGIN

    DECLARE sigueId INT;
    DECLARE sigueId2 INT;
    DECLARE sigueId3 INT;
    DECLARE sigueId4 INT;
    DECLARE sigueId5 INT;
    
    SELECT t.lugares_id
    FROM lugares t
    INNER JOIN lugar AS ex ON ex.id = t.lugar_id 
    WHERE t.id = p_id AND t.primera = 1
    INTO sigueId;

    IF sigueId IS NOT NULL THEN
        SELECT t.lugares_id
        FROM lugares t
        INNER JOIN lugar AS ex ON ex.id = t.lugar_id 
        WHERE t.id = sigueId
        INTO sigueId2;
        
        IF sigueId2 IS NOT NULL THEN
            SELECT t.lugares_id
            FROM lugares t
            INNER JOIN lugar AS ex ON ex.id = t.lugar_id 
            WHERE t.id = sigueId
            INTO sigueId3;
            
            IF sigueId3 IS NOT NULL THEN
                SELECT t.lugares_id
                FROM lugares t
                INNER JOIN lugar AS ex ON ex.id = t.lugar_id 
                WHERE t.id = sigueId
                INTO sigueId4;
                
                IF sigueId4 IS NOT NULL THEN
                    SELECT t.*, ex.nombre
                    FROM lugares t
                    INNER JOIN lugar AS ex ON ex.id = t.lugar_id
                    WHERE t.id = p_id
                    UNION
                    SELECT t.*, ex.nombre
                    FROM lugares t
                    INNER JOIN lugar AS ex ON ex.id = t.lugar_id
                    WHERE t.id = sigueId
                    UNION
                    SELECT t.*, ex.nombre
                    FROM lugares t
                    INNER JOIN lugar AS ex ON ex.id = t.lugar_id
                    WHERE t.id = sigueId2
                    UNION
                    SELECT t.*, ex.nombre
                    FROM lugares t
                    INNER JOIN lugar AS ex ON ex.id = t.lugar_id
                    WHERE t.id = sigueId3
                    UNION
                    SELECT t.*, ex.nombre
                    FROM lugares t
                    INNER JOIN lugar AS ex ON ex.id = t.lugar_id
                    WHERE t.id = sigueId4;
                ELSE
                    SELECT t.*, ex.nombre
                    FROM lugares t
                    INNER JOIN lugar AS ex ON ex.id = t.lugar_id
                    WHERE t.id = p_id
                    UNION
                    SELECT t.*, ex.nombre
                    FROM lugares t
                    INNER JOIN lugar AS ex ON ex.id = t.lugar_id
                    WHERE t.id = sigueId
                    UNION
                    SELECT t.*, ex.nombre
                    FROM lugares t
                    INNER JOIN lugar AS ex ON ex.id = t.lugar_id
                    WHERE t.id = sigueId2
                    UNION
                    SELECT t.*, ex.nombre
                    FROM lugares t
                    INNER JOIN lugar AS ex ON ex.id = t.lugar_id
                    WHERE t.id = sigueId3;
                END IF;
            ELSE
                SELECT t.*, ex.nombre
                FROM lugares t
                INNER JOIN lugar AS ex ON ex.id = t.lugar_id
                WHERE t.id = p_id
                UNION
                SELECT t.*, ex.nombre
                FROM lugares t
                INNER JOIN lugar AS ex ON ex.id = t.lugar_id
                WHERE t.id = sigueId
                UNION
                SELECT t.*, ex.nombre
                FROM lugares t
                INNER JOIN lugar AS ex ON ex.id = t.lugar_id
                WHERE t.id = sigueId2;
            END IF;
        ELSE
            SELECT t.*, ex.nombre
            FROM lugares t
            INNER JOIN lugar AS ex ON ex.id = t.lugar_id
            WHERE t.id = p_id
            UNION
            SELECT t.*, ex.nombre
            FROM lugares t
            INNER JOIN lugar AS ex ON ex.id = t.lugar_id
            WHERE t.id = sigueId;
        END IF;
    ELSE
        SELECT t.*, ex.nombre
        FROM lugares t
        INNER JOIN lugar AS ex ON ex.id = t.lugar_id
        WHERE t.id = p_id AND t.primera = 1;
    END IF;
    
END