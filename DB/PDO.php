<?php
$dsn = 'mysql:dbname=blog;host=127.0.0.1';
$user = 'root';
$password = '222222';
$db = new PDO($dsn,$user,$password);
$sql = 'SELECT * FROM websites WHERE is_delete = 0';
$data = [];
foreach($db->query($sql,PDO::FETCH_ASSOC) as $row){
    $data[] = $row;
}
print_r($data);