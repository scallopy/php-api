2. php: please write an api service (server side only) that update a mysql database and accept 2 calls:
 
    - modify a user balance in cents - it should receive userid and the amount to add or deduct.

    - insert or update a message into a messages table. with the following parameters: Id,date,title,msg,status,last update date.

how to start: 

## 1. Run container with:

    ➜  php_api docker-compose up --build    

## 2. Open http://127.0.0.1:8001/ and log in

## 3. Create databases:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    balance INT NOT NULL
);

CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATETIME NOT NULL,
    title VARCHAR(255) NOT NULL,
    msg TEXT NOT NULL,
    status VARCHAR(255) NOT NULL,
    last_update_date DATETIME NOT NULL
);
```

## 2. Open http://127.0.0.1:8002/
