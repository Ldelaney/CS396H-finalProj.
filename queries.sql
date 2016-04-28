SELECT U.ID
FROM Users as U
WHERE U.username = 'laura'
AND U.password = 'cat';

//replace 'laura' and 'cat' with variables, via prepared statements

INSERT INTO Calendar (UserID, Name, DocumentFilepath, exportType)
VALUES ((SELECT U.ID FROM Users as U WHERE U.username = 'laura' AND U.password = 'cat'),
 'calendarName', 'filepath', 'g');

//replace sample values with variables, using a prepared statement
