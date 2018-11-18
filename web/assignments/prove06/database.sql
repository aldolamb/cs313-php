CREATE TABLE league (id SERIAL PRIMARY KEY, name TEXT NOT NULL, creation_date DATE DEFAULT CURRENT_DATE);
CREATE TABLE bowler (id SERIAL PRIMARY KEY, first TEXT NOT NULL, middle TEXT NOT NULL, last TEXT NOT NULL, dob DATE NOT NULL, league INT NOT NULL REFERENCES league(id) DEFAULT 1, creation_date DATE DEFAULT CURRENT_DATE);
CREATE TABLE game (id SERIAL PRIMARY KEY, bowler INT NOT NULL references bowler(id), total INT NOT NULL, frames VARCHAR(21), creation_date DATE DEFAULT CURRENT_DATE);
INSERT INTO league (name) VALUES ('default');
INSERT INTO bowler (first, middle, last, dob) VALUES ('John', 'Aldo', 'Lamberti', date '1997-05-29'), ('Anna', 'Noelle', 'Soucy', date '1999-05-30');
INSERT INTO game (bowler, total, frames) VALUES (1, 179, '5/x x 523/5/x x x 50'), (1, 140, '1020x 1/2/x x 5242xxx'), (2, 182, 'x x x 534/x x x 5300');


CREATE TABLE league (
	id SERIAL PRIMARY KEY,
	name TEXT NOT NULL,
	creation_date DATE DEFAULT CURRENT_DATE
);

CREATE TABLE bowler (
	id SERIAL PRIMARY KEY,
	first TEXT NOT NULL,
	middle TEXT NOT NULL,
	last TEXT NOT NULL,
	phone INT NOT NULL,
	dob DATE NOT NULL,
	league INT NOT NULL REFERENCES league(id) DEFAULT 1,
	creation_date DATE DEFAULT CURRENT_DATE
);

CREATE TABLE game (
	id SERIAL PRIMARY KEY,
	bowler INT NOT NULL REFERENCES bowler(id),
	total INT NOT NULL,
	frames VARCHAR(21) NOT NULL,
	creation_date DATE DEFAULT CURRENT_DATE
);