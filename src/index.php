<?php
session_start();
require(dirname(__FILE__) . "/dbconnect.php");

$stmt = $db->query('SELECT id, title FROM events');
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($events);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>サンプル</title>
</head>
<ul>
    <?php foreach ($events as $key => $event) : ?>
        <li>
            <?= $event["id"]; ?>:<?= $event["title"]; ?>
        </li>
    <?php endforeach; ?>
    <a href="/admin/index.php">管理者ページ</a>
    <a href="/student/top/top.php">topPage</a>
    <a href="./admin/add/add.php">register data</a>
    <a href="./student/application/application.php">申し込み画面</a>
    <a href="./admin/adminList/adminList.php">adminlist</a>
    <a href="./client/studentDetail/studentDetail.php">学生詳細</a>

</ul>

<body>
</body>

</html>