/* select prices list for each cinema */
use cinema_sessions;
SELECT DISTINCT c.title, c.building_address, t.price FROM movie_sessions s INNER JOIN cinemas c ON s.cinema_id = c.id INNER JOIN tickets t ON t.id = s.ticket_id;

/* select cinema and session date for each user */
use cinema_sessions;
SELECT u.email, c.title, c.building_address, t.session_date  FROM orders o INNER JOIN users u ON o.user_id = u.id INNER JOIN movie_sessions s ON o.movie_session_id = s.id INNER JOIN cinemas c ON c.id = s.cinema_id INNER JOIN tickets t on t.id = s.ticket_id;

/* select prices and calculate how much tickets with different prices and their total price */
use cinema_sessions;
SELECT price, COUNT(price) AS total_amount, SUM(price) AS total_price FROM tickets GROUP BY price HAVING SUM(price) > 3;

use cinema_sessions;
SELECT * FROM tickets WHERE price > 3 ORDER BY price;

use cinema_sessions;
SELECT MAX(price) AS max_ticket_price, AVG(price) AS average_ticket_price FROM tickets;


use cinema_sessions;
SELECT * FROM movies WHERE is_premiere_week = 1;

use cinema_sessions;
SELECT title, is_premiere_week FROM movies ORDER BY is_premiere_week DESC;

use cinema_sessions;
SELECT * FROM orders WHERE user_id > 1 AND movie_session_id <> 2;

use cinema_sessions;
SELECT * FROM movies WHERE id = (SELECT movie_session_id FROM orders WHERE user_id = 1);