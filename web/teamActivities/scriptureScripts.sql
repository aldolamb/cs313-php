CREATE TABLE scriptures (id SERIAL PRIMARY KEY, book TEXT, chapter INT, verse INT, content TEXT);
INSERT INTO scriptures (book, chapter, verse, content) VALUES ('John', 1, 5, 'The light shines in the darkness, and the darkness has not overcome it.'), ('Doctrine and Covenantes', 88, 49, 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.'), ('Doctrine and Covenantes', 93, 28, 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.'), ('Mosiah', 16, 9, 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');
select * from scriptures;


CREATE TABLE scriptures (
	id SERIAL PRIMARY KEY,
	book TEXT,
	chapter INT,
	verse INT,
	content TEXT
);

INSERT INTO scriptures (book, chapter, verse, content) VALUES 
	('John', 1, 5, 'The light shines in the darkness, and the darkness has not overcome it.'),
	('Doctrine and Covenantes', 88, 49, 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.'),
	('Doctrine and Covenantes', 93, 28, 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.'),
	('Mosiah', 16, 9, 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');