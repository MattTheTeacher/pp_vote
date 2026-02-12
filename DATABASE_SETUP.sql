CREATE DATABASE IF NOT EXISTS pp_vote;
USE pp_vote;

CREATE TABLE IF NOT EXISTS proposals (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(100) NOT NULL,
  description TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Optional seed row (useful for testing Lesson 7–9 immediately)
INSERT INTO proposals (title, description)
VALUES ('Test Proposal', 'This is a seeded proposal description that is longer than twenty characters.')
ON DUPLICATE KEY UPDATE title=title;
