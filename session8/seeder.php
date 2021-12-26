<?php
require('db.php');


$sql = <<<EOF
INSERT INTO users (name, email, password) VALUES (
    'Md Mojahedul Islam', '2001mu.is@gmail.com', sha1('password')
);

INSERT INTO categories (name) VALUES
('Comedy'), ('Thriller');
EOF;


$query = $connection->prepare($sql);
$query->execute();
echo "Seeding Successfull!\n";
