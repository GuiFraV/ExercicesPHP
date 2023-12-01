DROP TABLE IF EXISTS posts;

CREATE TABLE posts
(
    id INT PRIMARY KEY,
    title TEXT NOT NULL,
    article TEXT NOT NULL,
    user_id INTEGER NOT NULL,
    created_at TEXT NOT NULL,
    updated_at TEXT
);

INSERT INTO posts (title, article, user_id, created_at)
VALUES
(
    'Lorem ipsum dolor sit amet',
    'Detailed article text here...',
    1,
    datetime('now', '-40 days')
);

INSERT INTO posts (title, article, user_id, created_at)
VALUES
(
    'Lorem ipsum dolor sit amet',
    'Detailed article text here...',
    2,
    datetime('now', '-2 months')
);

INSERT INTO posts (title, article, user_id, created_at)
VALUES
(
    'Lorem ipsum dolor sit amet',
    'Detailed article text here...',
    3,
    datetime('now', '-4 months')
);
