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
IF (@ID = '7184DD00-09FD-4078-BF22-D486434DED32')
	SELECT '200' AS 'Status'
ELSE 
	SELECT '404' AS 'Status'
	SET NOEXEC ON
END TRY
BEGIN CATCH
	SELECT '404' AS 'Status'
	SET NOEXEC ON
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

UPDATE UserInformation
SET First_Name = 'Keon', Last_Name = 'Hall', Address = '13 Yes St', City = 'Auckland | Glendene', Postcode = '602', State = 'Auckland'
WHERE UserId = '13B064FB-667E-41F9-BA6D-19213ECE880E';
UPDATE Login
SET Username = 'coolio', Password = 'newPWD', Email = 'friggate@hotmail.com'
WHERE UserID = '13B064FB-667E-41F9-BA6D-19213ECE880E'

Declare @var5 varchar(255) = (Select UserID from UserInformation where First_Name = 'Lilly')
Declare @var6 varchar(255) = (Select Password from Login Where UserID = @var5)
Select @var6 As 'Password', First_Name, Last_Name from UserInformation Where UserID = @var5

DECLARE @username varchar(255) = (Select Username from Login Where UserID = '13B064FB-667E-41F9-BA6D-19213ECE880E')
DECLARE @email varchar(255) = (Select Email from Login Where UserID = '13B064FB-667E-41F9-BA6D-19213ECE880E')

SELECT 
'SqlGet' AS Status, @username AS 'Username', @email AS 'Email', First_Name,Last_Name,Phone,Address,City,Postcode,State FROM UserInformation WHERE UserID = '13B064FB-667E-41F9-BA6D-19213ECE880E';

BEGIN TRY
DECLARE @username varchar(255) = (Select Username from Login Where UserID = '13B064FB-667E-41F9-BA6D-19213ECE880E')
DECLARE @email varchar(255) = (Select Email from Login Where UserID = '13B064FB-667E-41F9-BA6D-19213ECE880E')

DECLARE @ID varchar(255)
DECLARE @Status int;
SET @ID =(SELECT UserID FROM Login WHERE UserID 
= '13B064FB-667E-41F9-BA6D-19213ECE880E')
IF (@ID = '13B064FB-667E-41F9-BA6D-19213ECE880E')
	SELECT 
'SqlGet' AS 'Status', @username AS 'Username', @email AS 'Email', First_Name,Last_Name,Phone,Address,City,Postcode,State FROM UserInformation WHERE UserID = '13B064FB-667E-41F9-BA6D-19213ECE880E';
ELSE 
	SELECT '404' AS 'Status'
	SET NOEXEC ON
END TRY
BEGIN CATCH
	SELECT '404' AS 'Status'
	SET NOEXEC ON
END CATCH
SET NOEXEC OFF;