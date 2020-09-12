Select * from Notification;
Select * from UserInformation;
Select * from Login;

DECLARE @username varchar(255)
SET @username = (SELECT Username FROM Login WHERE Username LIKE 'Yone')
    IF @username = 'Yone'
    RETURN;

Delete from Notification;
WAITFOR DELAY '00:00:00.200';
Delete from UserInformation;
WAITFOR DELAY '00:00:00.200';
Delete from Login;

THROW 51000, 'The User Already Exists.', 10; 
