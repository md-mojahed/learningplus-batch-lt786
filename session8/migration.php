<?php
require('db.php');


$sql = <<<EOF
CREATE TABLE users (
    id int NOT NULL AUTO_INCREMENT,
    name varchar(30) NOT NULL,
    email varchar(50) NOT NULL,
    password varchar(255) NOT NULL,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

CREATE TABLE categories (
    id int NOT NULL AUTO_INCREMENT,
    name varchar(30) NOT NULL,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

CREATE TABLE posts (
    id int NOT NULL AUTO_INCREMENT,
    category_id int NOT NULL,
    title varchar(30) NOT NULL,
    description varchar(2000) NOT NULL,
    image varchar(300) NOT NULL,
    posted_by int NOT NULL,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (posted_by) REFERENCES users(id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);
EOF;


$query = $connection->prepare($sql);
$query->execute();
echo "Migration Successfull!\n";
