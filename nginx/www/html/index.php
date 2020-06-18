<center><h3>Hello</h3></center>
<hr>
<?php
// Включаем отображение ошибок //
ini_set('display_errors', 1);
error_reporting(E_ALL);


echo "Test Sql Drivers\n";



// Check mysqli driver //
echo " - mysqli driver:\t\t";
echo class_exists('mysqli') ? "OK\n" : "No driver\n";

// Check PDO driver //
echo " - PDO driver:\t\t\t";
echo class_exists('PDO') ? "OK\n" : "No driver\n";

// Check Memcached driver //
echo " - Memcached driver:\t\t";
echo class_exists('Memcached') ? "OK\n" : "No driver\n";




// Test mysqli //
// echo '<hr>';
// $link = mysqli_connect('0.0.0.0:3307', 'test', 'test', 'test');
// if (!$link) {
//     die('Ошибка соединения: ' . mysql_error());
// }
// echo 'Успешно соединились';
// mysql_close($link);



// Test pdo //
echo '<hr>';
$errors = [];
try {
    $dbh = new PDO('mysql:host=db', 'root', 'example');
} catch (Exception $e) {
    $errors[] = $e->getMessage();
}

if ($errors) {
    echo 'Base test: ';
    echo '<font color="red">Errors<br> - ';
    echo implode('<br> - ', $errors);
    echo '</font>';
}
else {
    echo 'Base test: ';
    echo '<font color="green">Ok<br>';
    var_dump($dbh);
    echo '</font>';

    echo '<hr><pre>';
    $dbh->query("SET CHARSET 'utf8'");
    $query = 'select user, host from mysql.user';
    //$prepare = $dbh->prepare($query);
    var_dump($dbh->query($query)->fetchAll(PDO::FETCH_ASSOC));
}
