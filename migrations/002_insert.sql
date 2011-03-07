INSERT INTO `wiki_versions` ( `created_at`, title, `body`, `author_id`) VALUES
(now(), 'Welcome', '= Index\nThis is some handy\r\n\r\n*markdown*', 1);

INSERT INTO `wikis` (`path`, `current_version_id`) VALUES
('', LAST_INSERT_ID());

