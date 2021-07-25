<html>
<head>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<?php
error_reporting(E_ALL);
ini_set('display_errors','on');

function addNote($str1, $str2) {
    echo "<div class=\"block2\">" . $str1 . "</div><div class=\"block3\">" . $str2 . "</div>";
}

$mySql = new mysqli('localhost', 'user', 'password', 'bdname') or die('Не удалось соединиться: ' . mysql_error());
$query = "SELECT posts.title, comments.body FROM posts INNER JOIN comments ON posts.id=comments.postId WHERE comments.body LIKE '%" . $_POST["query"] . "%';";
$result = $mySql->query($query) or trigger_error(mysql_error());
echo "COUNT: " . $result->num_rows . "<br>";

foreach($result as $r) {
    $keys = array_keys($r);
    $values = array_values($r);
    addNote($keys[0] . ": " . $values[0], $keys[1] . ": " . $values[1] );
}
?>

</body>
</html>
