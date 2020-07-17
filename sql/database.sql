CREATE TABLE IF NOT EXISTS "billionaires" (
	"id"		INTEGER PRIMARY KEY AUTOINCREMENT,
	"name"		TEXT,
	"money"		INTEGER,
	"link"		TEXT UNIQUE
);

INSERT OR IGNORE INTO "billionaires" (id, name,	money, link) VALUES (1, 'Jeff Bezos', 113, 'http://zezedicamargoeluciano.com.br');
INSERT OR IGNORE INTO "billionaires" (id, name,	money, link) VALUES (2, 'Bill Gates', 98, '');
INSERT OR IGNORE INTO "billionaires" (id, name,	money, link) VALUES (3, 'Bernard Arnault & family', 76, 'http://www.chrystianeralf.com.br');
INSERT OR IGNORE INTO "billionaires" (id, name,	money, link) VALUES (4, 'Warren Buffett', 67, '');
INSERT OR IGNORE INTO "billionaires" (id, name,	money, link) VALUES (5, 'Larry Ellison', 59, 'https://www.youtube.com/watch?v=S2OI1CtnfUM');
INSERT OR IGNORE INTO "billionaires" (id, name,	money, link) VALUES (6, 'Amancio Ortega', 55, '');
INSERT OR IGNORE INTO "billionaires" (id, name,	money, link) VALUES (7, 'Mark Zuckerberg', 54, '');