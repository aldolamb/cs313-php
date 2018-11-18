
**********************
--- VISUAL OUTLINE ---
**********************

ctblMonths
- Abbreviation: VARCHAR(50)
- Name:         VARCHAR(50) PK

ctblSessionDays
- Day:          VARCHAR(20) PK

ctblSessionTypes 
- Code:         VARCHAR(5) PK,
- Value:        VARCHAR(50)

tblSpeakers
- SpeakerID:    INT
- FirstName:    VARCHAR(50)
- LastName:     VARCHAR(50)
- Title:        VARCHAR(50)
- Position:     VARCHAR(50)

tblSessions
- SessionID:    INT
- Year:         INT
- Month:        VARCHAR(50) Fk ctblMonths(Name)
- Day:          VARCHAR(20) Fk ctblSessionDays(Day)
- isMorning:    BOOLEAN

tblUsers
- UserID:       INT
- FirstName:    VARCHAR(50)
- LastName:     VARCHAR(50)

tblNotes
- SpeakerID:    INT Fk tblSpeakers(SpeakerID)
- SessionID:    INT Fk tblSessions(SessionID)
- UserID:       INT Fk tblUsers(UserID)
- Notes:        TEXT






***********************
--- SQL Commands---
***********************

CREATE TABLE ctblMonths  (
	Abbreviation VARCHAR(50),
	Name VARCHAR(50) primary key
);
CREATE TABLE ctblSessionDays (
	Day VARCHAR(20) primary key
);
CREATE TABLE ctblSessionTypes (
	Code VARCHAR(5) primary key,
	Value VARCHAR(50)
);
CREATE TABLE tblSpeakers (
	SpeakerID SERIAL primary key,
	FirstName VARCHAR(50),
	MiddleName VARCHAR(50),
	LastName VARCHAR(50),
	Title VARCHAR(50),
	Position VARCHAR(50)
);
CREATE TABLE tblSessions (
	SessionID SERIAL primary key,
	Year INT,
	Month VARCHAR(50) REFERENCES ctblMonths(Name),
	SessionType VARCHAR(5) REFERENCES ctblSessionTypes(code)
);
CREATE TABLE tblUsers (
	UserID SERIAL primary key,
	FirstName VARCHAR(50),
	LastName VARCHAR(50)
);
CREATE TABLE tblNotes (
	NoteID SERIAL primary key,
	SpeakerID INT REFERENCES tblSpeakers(SpeakerID),
	SessionID INT REFERENCES tblSessions(SessionID),
	UserID INT REFERENCES tblUsers(UserID),
	Notes TEXT
);


INSERT INTO ctblMonths VALUES 
	('Apr', 'April'),
	('Oct', 'October');
INSERT INTO ctblSessionDays VALUES 
	('Saturday'), 
	('Sunday');
INSERT INTO ctblSessionTypes VALUES 
	('SATAM', 'Saturday Morning'),
	('SATPM', 'Saturday Afternoon'),
	('SUNAM', 'Sunday Morning'),
	('SATPM', 'Sunday Afternoon'),
	('WOMEN', 'Womens'),
	('PRIES', 'Priesthood');
INSERT INTO tblSpeakers (FirstName, MiddleName, LastName, Title, Position) VALUES 
	('Russel', 'M', 'Nelson', 'President', 'Church President'),
	('Dallin', 'H', 'Oaks', 'President', 'First Counselor in the First Presidency'),
	('Henry', 'B', 'Eyring', 'President', 'Second Counselor in the First Presidency'),
	('M', 'Russel', 'Ballard', 'President', 'Acting President of the Quorum of the Twelve Apostles'),
	('Jeffery', 'R', 'Holland', 'Elder', 'Quorum of the Twelve Apostles'),
	('Dieter', 'F', 'Uchtdorf', 'Elder', 'Quorum of the Twelve Apostles'),
	('David', 'A', 'Bednar', 'Elder', 'Quorum of the Twelve Apostles'),
	('Quentin', 'L', 'Cook', 'Elder', 'Quorum of the Twelve Apostles'),
	('D', 'Todd', 'Christofferson', 'Elder', 'Quorum of the Twelve Apostles'),
	('Neil', 'L', 'Anderson', 'Elder', 'Quorum of the Twelve Apostles'),
	('Ronald', 'A', 'Rasband', 'Elder', 'Quorum of the Twelve Apostles'),
	('Gary', 'E', 'Stevenson', 'Elder', 'Quorum of the Twelve Apostles'),
	('Dale', 'G', 'Renlund', 'Elder', 'Quorum of the Twelve Apostles'),
	('Gerrit', 'W', 'Gong', 'Elder', 'Quorum of the Twelve Apostles'),
	('Ulisses', null, 'Soares', 'Elder', 'Quorum of the Twelve Apostles');
INSERT INTO tblSessions (Year, Month, SessionType) VALUES 
	(2016, 'April', 'SATAM'),
	(2016, 'April', 'SATPM'),
	(2016, 'April', 'SUNAM'),
	(2016, 'April', 'SATPM'),
	(2016, 'April', 'WOMEN'),
	(2016, 'April', 'PRIES'),
	(2016, 'October', 'SATAM'),
	(2016, 'October', 'SATPM'),
	(2016, 'October', 'SUNAM'),
	(2016, 'October', 'SATPM'),
	(2016, 'October', 'WOMEN'),
	(2016, 'October', 'PRIES'),
	(2017, 'April', 'SATAM'),
	(2017, 'April', 'SATPM'),
	(2017, 'April', 'SUNAM'),
	(2017, 'April', 'SATPM'),
	(2017, 'April', 'WOMEN'),
	(2017, 'April', 'PRIES'),
	(2017, 'October', 'SATAM'),
	(2017, 'October', 'SATPM'),
	(2017, 'October', 'SUNAM'),
	(2017, 'October', 'SATPM'),
	(2017, 'October', 'WOMEN'),
	(2017, 'October', 'PRIES'),
	(2018, 'April', 'SATAM'),
	(2018, 'April', 'SATPM'),
	(2018, 'April', 'SUNAM'),
	(2018, 'April', 'SATPM'),
	(2018, 'April', 'WOMEN'),
	(2018, 'April', 'PRIES'),
	(2018, 'October', 'SATAM'),
	(2018, 'October', 'SATPM'),
	(2018, 'October', 'SUNAM'),
	(2018, 'October', 'SATPM'),
	(2018, 'October', 'WOMEN'),
	(2018, 'October', 'PRIES');
INSERT INTO tblUsers (FirstName, LastName) VALUES 
	('John', 'Doe'),
	('Jane', 'Doe'),
	('Jimmy', 'Doe'),
	('Alice', 'Doe');
INSERT INTO tblNotes VALUES 
	(1, 2, 1, 'Church is becoming more family centered'),
	(8, 2, 1, 'Church is now ONLY 2 HOURS LONG!!!!!');

*********************
--- QUERY COMMANDS ---
*********************

*** query tables ***
SELECT * FROM ctblMonths;
SELECT * FROM ctblSessionDays;
SELECT * FROM ctblSessionTypes;
SELECT * FROM tblSpeakers;
SELECT * FROM tblSessions;
SELECT * FROM tblUsers;
SELECT * FROM tblNotes;

SELECT 
	tblNotes.Notes,
	tblUsers.FirstName || ' ' || tblUsers.LastName AS UserName,
	tblSpeakers.Title || ' ' || tblSpeakers.FirstName || ' ' || tblSpeakers.MiddleName || ' ' || tblSpeakers.LastName AS speaker,
	tblSessions.Year || ' ' || tblSessions.Month || ' - ' || ctblSessionTypes.Value AS session
FROM 
	tblNotes 
	JOIN tblUsers ON (tblNotes.UserID = tblUsers.UserID)
	JOIN tblSessions ON (tblNotes.SessionID = tblSessions.SessionID)
	JOIN tblSpeakers ON (tblNotes.SpeakerID = tblSpeakers.SpeakerID)
	JOIN ctblSessionTypes ON (tblSessions.sessionType = ctblSessionTypes.code);

*********************
--- DROP COMMANDS ---
*********************

DROP TABLE tblNotes;
DROP TABLE tblUsers;
DROP TABLE tblSessions;
DROP TABLE tblSpeakers;
DROP TABLE ctblSessionTypes;
DROP TABLE ctblSessionDays;
DROP TABLE ctblMonths;


******************************
--- OTHER USERFUL COMMANDS ---
******************************

SHOW ALL TABLES: \dt

