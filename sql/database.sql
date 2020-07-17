CREATE TABLE IF NOT EXISTS "billionaires" (
	"id"		INTEGER PRIMARY KEY AUTOINCREMENT,
	"name"		TEXT,
	"money"		INTEGER,
	"link"		TEXT UNIQUE
);

INSERT OR IGNORE INTO "billionaires" (id, name,	money, link) VALUES (1, 'Jeff Bezos', 113, 'http://zezedicamargoeluciano.com.br');
INSERT OR IGNORE INTO "billionaires" (id, name,	money, link) VALUES (2, 'Bill Gates', 54, '');
INSERT OR IGNORE INTO "billionaires" (id, name,	money, link) VALUES (3, 'Chrystian & Ralf', 'Sozinho em Nova York', 'http://www.chrystianeralf.com.br');
INSERT OR IGNORE INTO "billionaires" (id, name,	money, link) VALUES (4, 'Henrique e Juliano', 'Garrafas Vazias', '');
INSERT OR IGNORE INTO "billionaires" (id, name,	money, link) VALUES (5, 'Gusttavo Lima', 'Agente Fez Amor', 'https://www.youtube.com/watch?v=S2OI1CtnfUM');
INSERT OR IGNORE INTO "billionaires" (id, name,	money, link) VALUES (6, 'Marília Mendonça', 'Tentativas', '');
INSERT OR IGNORE INTO "billionaires" (id, name,	money, link) VALUES (7, 'Di Paullo & Paulino', 'Nada Mudou', '');