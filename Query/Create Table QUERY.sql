CREATE TABLE Login(
	UserID uniqueidentifier  NOT NULL default newid() PRIMARY KEY,
	Username VARCHAR(50) not null,
	Password VARCHAR(255) not null,
	Email VARCHAR(255) not null

)

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
)

CREATE TABLE Notification(
	ID int NOT NULL IDENTITY(1,1) PRIMARY KEY,
	UserID uniqueidentifier NOT NULL,
	Notify BIT NOT NULL
	FOREIGN KEY (UserID) REFERENCES Login(UserID),
)
