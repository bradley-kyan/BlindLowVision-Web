CREATE TABLE Login(
	UserID uniqueidentifier  NOT NULL default newid() PRIMARY KEY,
	Username VARCHAR(50) not null,
	Password VARCHAR(255) not null,
	Email VARCHAR(255) not null
)
GO
CREATE TABLE UserInformation(
	ID int NOT NULL IDENTITY(1,1) PRIMARY KEY,
	UserID uniqueidentifier NOT NULL,
	FOREIGN KEY (UserID) REFERENCES Login(UserID),
	First_Name VARCHAR(25),
	Last_Name VARCHAR(25) NOT NULL,
	Phone VARCHAR(25),
	Address VARCHAR(255),
	City VARCHAR(100),
	Postcode INT,
	Creation_Time datetime DEFAULT(getdate()),
	State varchar(255),
	Total_Donate decimal(12,2),
	Current_Donate decimal(12,2),
)
GO
CREATE TABLE Notification(
	ID int NOT NULL IDENTITY(1,1) PRIMARY KEY,
	UserID uniqueidentifier NOT NULL,
	Notify BIT NOT NULL
	FOREIGN KEY (UserID) REFERENCES Login(UserID),
)
GO
CREATE TABLE Transactions (
	ID int NOT NULL IDENTITY(1,1) PRIMARY KEY,
	UserID uniqueidentifier NOT NULL,
	FOREIGN KEY (UserID) REFERENCES Login(UserID),
	Transaction_Time datetime DEFAULT(getdate()),
	Transaction_Amount decimal(12,2),
	CC_Number VARCHAR(19),
	CC_Exp VARCHAR(7),
	CC_Name VARCHAR(100),
	CC_Address VARCHAR(255),
	CC_City VARCHAR(255),
	CC_State VARCHAR(255),
)