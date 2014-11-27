DROP PROCEDURE IF EXISTS getFullLugares;
DELIMITER $
CREATE PROCEDURE `getFullLugares`(p_id INT)
BEGIN
    
    DECLARE sigueId INT;

    SELECT lugares_id FROM lugares
    WHERE id = p_id
    INTO sigueId;

    IF sigueId IS NOT NULL THEN
        SELECT lugares_id FROM lugares
        WHERE id = sigueId
        INTO sigueId;
        
        IF sigueId IS NOT NULL THEN
            SELECT lugares_id FROM lugares
            WHERE id = sigueId
            INTO sigueId;
            
            IF sigueId IS NOT NULL THEN
                SELECT lugares_id FROM lugares
                WHERE id = sigueId
                INTO sigueId;
                
                IF sigueId IS NOT NULL THEN
                    SELECT ex.nombre AS '0', ex2.nombre AS '1', ex3.nombre AS '2', ex4.nombre AS '3', ex5.nombre AS '4'
                    FROM lugares t
                    INNER JOIN lugar AS ex ON ex.id = t.lugar_id AND t.primera = 1
                    LEFT JOIN lugares AS t2 ON t.lugares_id = t2.id
                    LEFT JOIN lugar AS ex2 ON t2.lugar_id = ex2.id
                    LEFT JOIN lugares AS t3 ON t2.lugares_id = t3.id
                    LEFT JOIN lugar AS ex3 ON t3.lugar_id = ex3.id
                    LEFT JOIN lugares AS t4 ON t3.lugares_id = t4.id
                    LEFT JOIN lugar AS ex4 ON t4.lugar_id = ex4.id
                    LEFT JOIN lugares AS t5 ON t4.lugares_id = t5.id
                    LEFT JOIN lugar AS ex5 ON t5.lugar_id = ex5.id
                    WHERE t.id = p_id;
                ELSE
                    SELECT ex.nombre AS '0', ex2.nombre AS '1', ex3.nombre AS '2', ex4.nombre AS '3'
                    FROM lugares t
                    INNER JOIN lugar AS ex ON ex.id = t.lugar_id AND t.primera = 1
                    LEFT JOIN lugares AS t2 ON t.lugares_id = t2.id
                    LEFT JOIN lugar AS ex2 ON t2.lugar_id = ex2.id
                    LEFT JOIN lugares AS t3 ON t2.lugares_id = t3.id
                    LEFT JOIN lugar AS ex3 ON t3.lugar_id = ex3.id
                    LEFT JOIN lugares AS t4 ON t3.lugares_id = t4.id
                    LEFT JOIN lugar AS ex4 ON t4.lugar_id = ex4.id
                    WHERE t.id = p_id;
                END IF;
            ELSE
                SELECT ex.nombre AS '0', ex2.nombre AS '1', ex3.nombre AS '2'
                FROM lugares t
                INNER JOIN lugar AS ex ON ex.id = t.lugar_id AND t.primera = 1
                LEFT JOIN lugares AS t2 ON t.lugares_id = t2.id
                LEFT JOIN lugar AS ex2 ON t2.lugar_id = ex2.id
                LEFT JOIN lugares AS t3 ON t2.lugares_id = t3.id
                LEFT JOIN lugar AS ex3 ON t3.lugar_id = ex3.id
                WHERE t.id = p_id;
            END IF;
        ELSE
            SELECT ex.nombre AS '0', ex2.nombre AS '1'
            FROM lugares t
            INNER JOIN lugar AS ex ON ex.id = t.lugar_id AND t.primera = 1
            LEFT JOIN lugares AS t2 ON t.lugares_id = t2.id
            LEFT JOIN lugar AS ex2 ON t2.lugar_id = ex2.id
            WHERE t.id = p_id;
        END IF;
    ELSE
        SELECT ex.nombre AS '0'
        FROM lugares t
        INNER JOIN lugar AS ex ON ex.id = t.lugar_id AND t.primera = 1
        WHERE t.id = p_id;
    END IF;
    
END