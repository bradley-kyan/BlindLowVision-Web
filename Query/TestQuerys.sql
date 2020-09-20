Select * from Notification;
Select * from UserInformation;
Select * from Login;
Select * from Transactions;

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

BEGIN TRY
DECLARE @ID varchar(255)
SET @ID =(SELECT UserID FROM Login WHERE UserID 
= '7184DD00-09FD-4078-BF22-D486434DED32')
		SELECT '200' AS 'Status'
END TRY
BEGIN CATCH
	SELECT '404' AS 'Status'
END CATCH
GO
Declare @var3 varchar(255)
Set @var3 = (Select Current_Donate from UserInformation Where UserID = '7184DD00-09FD-4078-BF22-D486434DED32')
If (@var3 is null)
	Begin
	UPDATE UserInformation
	SET Current_Donate = 0
	WHERE UserID = '7184DD00-09FD-4078-BF22-D486434DED32';
	End
Else
Begin
UPDATE UserInformation
SET Current_Donate = Current_Donate + 1
WHERE UserID = '7184DD00-09FD-4078-BF22-D486434DED32';
End
GO
Select * from UserInformation;