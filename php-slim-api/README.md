# PHP API with Slim

## Database:

```sql
✗ mysql --user=game_user --password game_db
Enter password: 
MariaDB [game_db]> CREATE TABLE users (
    ->     id INT AUTO_INCREMENT PRIMARY KEY,
    ->     username VARCHAR(255) NOT NULL,
    ->     balance INT NOT NULL
    -> );
MariaDB [game_db]> CREATE TABLE messages (
    ->     id INT AUTO_INCREMENT PRIMARY KEY,
    ->     date DATETIME NOT NULL,
    ->     title VARCHAR(255) NOT NULL,
    ->     msg TEXT NOT NULL,
    ->     status VARCHAR(255) NOT NULL,
    ->     last_update_date DATETIME NOT NULL
    -> );
MariaDB [game_db]> SHOW TABLES;
MariaDB [game_db]> DESCRIBE users;
MariaDB [game_db]> DESCRIBE messages;
MariaDB [game_db]> INSERT INTO users ( username, balance ) VALUES ('John', '12'), ('Samuel', 
'25');
MariaDB [game_db]> SELECT * FROM users;
```

## Run server:

    php -S localhost:8888 -t public