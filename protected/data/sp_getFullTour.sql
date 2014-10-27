DROP PROCEDURE IF EXISTS getFullTour;
DELIMITER $
CREATE PROCEDURE getFullTour(p_id INT)
BEGIN
    
    DECLARE sigueId INT;

    SELECT tour_id FROM tour
    WHERE id = p_id
    INTO sigueId;

    IF sigueId IS NOT NULL THEN
        SELECT tour_id FROM tour
        WHERE id = sigueId
        INTO sigueId;
        
        IF sigueId IS NOT NULL THEN
            SELECT tour_id FROM tour
            WHERE id = sigueId
            INTO sigueId;
            
            IF sigueId IS NOT NULL THEN
                SELECT tour_id FROM tour
                WHERE id = sigueId
                INTO sigueId;
                
                IF sigueId IS NOT NULL THEN
                    SELECT ex.nombre AS '0', ex2.nombre AS '1', ex3.nombre AS '2', ex4.nombre AS '3', ex5.nombre AS '4'
                    FROM tour t
                    INNER JOIN excursion AS ex ON ex.id = t.excursion_id AND t.primera = 1
                    LEFT JOIN tour AS t2 ON t.tour_id = t2.id
                    LEFT JOIN excursion AS ex2 ON t2.excursion_id = ex2.id
                    LEFT JOIN tour AS t3 ON t2.tour_id = t3.id
                    LEFT JOIN excursion AS ex3 ON t3.excursion_id = ex3.id
                    LEFT JOIN tour AS t4 ON t3.tour_id = t4.id
                    LEFT JOIN excursion AS ex4 ON t4.excursion_id = ex4.id
                    LEFT JOIN tour AS t5 ON t4.tour_id = t5.id
                    LEFT JOIN excursion AS ex5 ON t5.excursion_id = ex5.id
                    WHERE t.id = p_id;
                ELSE
                    SELECT ex.nombre AS '0', ex2.nombre AS '1', ex3.nombre AS '2', ex4.nombre AS '3'
                    FROM tour t
                    INNER JOIN excursion AS ex ON ex.id = t.excursion_id AND t.primera = 1
                    LEFT JOIN tour AS t2 ON t.tour_id = t2.id
                    LEFT JOIN excursion AS ex2 ON t2.excursion_id = ex2.id
                    LEFT JOIN tour AS t3 ON t2.tour_id = t3.id
                    LEFT JOIN excursion AS ex3 ON t3.excursion_id = ex3.id
                    LEFT JOIN tour AS t4 ON t3.tour_id = t4.id
                    LEFT JOIN excursion AS ex4 ON t4.excursion_id = ex4.id
                    WHERE t.id = p_id;
                END IF;
            ELSE
                SELECT ex.nombre AS '0', ex2.nombre AS '1', ex3.nombre AS '2'
                FROM tour t
                INNER JOIN excursion AS ex ON ex.id = t.excursion_id AND t.primera = 1
                LEFT JOIN tour AS t2 ON t.tour_id = t2.id
                LEFT JOIN excursion AS ex2 ON t2.excursion_id = ex2.id
                LEFT JOIN tour AS t3 ON t2.tour_id = t3.id
                LEFT JOIN excursion AS ex3 ON t3.excursion_id = ex3.id
                WHERE t.id = p_id;
            END IF;
        ELSE
            SELECT ex.nombre AS '0', ex2.nombre AS '1'
            FROM tour t
            INNER JOIN excursion AS ex ON ex.id = t.excursion_id AND t.primera = 1
            LEFT JOIN tour AS t2 ON t.tour_id = t2.id
            LEFT JOIN excursion AS ex2 ON t2.excursion_id = ex2.id
            WHERE t.id = p_id;
        END IF;
    ELSE
        SELECT ex.nombre AS '0'
        FROM tour t
        INNER JOIN excursion AS ex ON ex.id = t.excursion_id AND t.primera = 1
        WHERE t.id = p_id;
    END IF;
    
END