CREATE TABLE IF NOT EXISTS "billionaires" (
	"id"		INTEGER PRIMARY KEY AUTOINCREMENT,
	"name"		TEXT,
	"money"		INTEGER,
	"link"		TEXT
);

INSERT OR IGNORE INTO "billionaires" (id, name,	money, link) VALUES (1, 'Jeff Bezos', 1130, 'https://en.wikipedia.org/wiki/Jeff_Bezos');
INSERT OR IGNORE INTO "billionaires" (id, name,	money, link) VALUES (2, 'Bill Gates', 980, '');
INSERT OR IGNORE INTO "billionaires" (id, name,	money, link) VALUES (3, 'Bernard Arnault & family', 760, '');
INSERT OR IGNORE INTO "billionaires" (id, name,	money, link) VALUES (4, 'Warren Buffett', 675, '');
INSERT OR IGNORE INTO "billionaires" (id, name,	money, link) VALUES (5, 'Larry Ellison', 590, '');
INSERT OR IGNORE INTO "billionaires" (id, name,	money, link) VALUES (6, 'Amancio Ortega', 551, '');
INSERT OR IGNORE INTO "billionaires" (id, name,	money, link) VALUES (7, 'Mark Zuckerberg', 547, '');
INSERT OR IGNORE INTO "billionaires" (id, name,	money, link) VALUES (8, 'Jim Walton', 546, '');