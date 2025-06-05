-- Authors
INSERT INTO authors (name) VALUES 
('George Orwell'),
('J.K. Rowling'),
('Isaac Asimov'),
('J.R.R. Tolkien');

-- Publishers
INSERT INTO publishers (name) VALUES 
('Penguin Books'),
('Bloomsbury'),
('HarperCollins'),
('Random House');

-- Genres
INSERT INTO genres (name) VALUES 
('Science Fiction'),
('Fantasy'),
('Dystopian'),
('Adventure'),
('Young Adult');

-- Books
INSERT INTO books (title, author_id, publisher_id) VALUES
('1984', 1, 1),
('Harry Potter and the Sorcerer\'s Stone', 2, 2),
('Foundation', 3, 4),
('The Hobbit', 4, 3),
('Harry Potter and the Chamber of Secrets', 2, 2);

-- Book-Genres
INSERT INTO book_genres (book_id, genre_id) VALUES
(1, 3), -- 1984 → Dystopian
(1, 1), -- 1984 → Sci-Fi
(2, 2), -- HP1 → Fantasy
(2, 5), -- HP1 → YA
(2, 4), -- HP1 → Adventure
(3, 1), -- Foundation → Sci-Fi
(4, 2), -- Hobbit → Fantasy
(4, 4), -- Hobbit → Adventure
(5, 2), -- HP2 → Fantasy
(5, 5); -- HP2 → YA
