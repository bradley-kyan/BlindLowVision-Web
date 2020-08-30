CREATE TRIGGER CreationTimeTrigger
   ON  dbo.UserInformation
   AFTER INSERT
AS 
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;
	DECLARE @First_Name varchar(25)=(select First_Name from inserted)
    -- Insert statements for trigger here
	update UserInformation set Creation_Time=getdate() where First_Name=@First_Name
END
GO
