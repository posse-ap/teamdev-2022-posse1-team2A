<?php
session_start();
require "./dbconnect.php";

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
    <a href="./student/agentDetail/agentDetail.php">エージェント詳細</a>
    <a href="./student/searchResult/searchResult.php">検索結果</a>
    <a href="./client/studentList/studentList.php">学生リスト</a>
    <a href="./admin/adminDetail/adminDetail.php">契約情報</a>
    <a href="./client/login/login.php">クライアントログイン</a>

</ul>

<body>
</body>

</html>