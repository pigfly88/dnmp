<?php
$dsn = 'mysql:dbname=test;host=docker-lnmp-demo_mysql_1';
$user = 'root';
$password = '123';

try {
    $dbh = new PDO($dsn, $user, $password);
    $sql = 'SELECT * FROM user WHERE id=?';
    $sth = $dbh->prepare($sql);
    $sth->execute(array(1));
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    var_dump($result);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

