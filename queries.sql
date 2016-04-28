SELECT ID
FROM User
WHERE User.name = $userusername
AND User.pass = $userpassword;


INSERT INTO Calendar (UserID, name, filepath)
VALUES ($ID, $calendarName, $_SESSION["filepath"]);
