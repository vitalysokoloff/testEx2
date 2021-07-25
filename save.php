<?php

// Соединяемся, выбираем базу данных
$mySql = new mysqli('localhost', 'user', 'password', 'bdname') or die('Не удалось соединиться: ' . mysql_error());

// Заполняем таблицу с постами
$posts = json_decode(file_get_contents('https://jsonplaceholder.typicode.com/posts'), true);
foreach($posts as $p) {
    $keys = array_keys($p);
    $values = array_values($p);
    
    // Выполняем SQL-запрос
    $query = "INSERT INTO posts (". $keys[0] .", ". $keys[1] .", ". $keys[2] .", ". $keys[3] .") VALUES ('". $values[0] ."', '". $values[1] . "', '". $values[2] . "', '". $values[3] . "');";
    $mySql->query($query) or die('Запрос не удался: ' . mysql_error());
}

// Заполняем таблицу с комментами
$comments = json_decode(file_get_contents('https://jsonplaceholder.typicode.com/comments'), true);
foreach($comments as $с) {
    $keys = array_keys($с);
    $values = array_values($с);
    
    // Выполняем SQL-запрос
    $query = "INSERT INTO comments (". $keys[0] .", ". $keys[1] .", ". $keys[2] .", ". $keys[3] .", ". $keys[4] .") VALUES ('". $values[0] ."', '". $values[1] . "', '". $values[2] . "', '". $values[3] . "' , '". $values[4] . "');";
    $mySql->query($query) or die('Запрос не удался: ' . mysql_error());
}

print "загружено " . count($posts) ." записей и " . count($comments) ." комментариев";

?>
