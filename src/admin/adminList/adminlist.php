<?php 

require "../../dbconnect.php";
session_start();
$username=$_SESSION['admin_name'];
$agentCount="SELECT agent_name, COUNT( agent_name ) FROM agent_count GROUP BY agent_name;";

$agent_counts=$db->query($agentCount)->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adminlist</title>
    <link rel="stylesheet" href="../../reset.css">
    <link rel="stylesheet" href="./adminlist.css">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/3ded641fb3.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <section class="header_container">admin</section>
    </header>
    <main>
        <section class="option_container_1">
            <div class="admin_username_box"><?=$username?>さん</div>
            <div class="admin_search_box">
                <form action="">
                    <input type="search" name="admin_search" placeholder="キーワードを入力">
                    <input type="submit" name="admin_search_submit" value="検索">
                </form>
            </div>
            <div class="admin_add_button_container">
                <a class="admin_add_button" href="../add/add.php">エージェントを追加</a>
            </div>
        </section>
        <section class="option_container_2">
            <div class="admin_agent_sort_box">並び替える</div>
            <section class="admin_month_container">
                <i class="fa-solid fa-angle-left"></i>
                <p>2022 10月</p>
                <i class="fa-solid fa-angle-right"></i>
            </section>
        </section>
        <section class="agent_list_container">
            <table class="detail_table">
                <thead>
                    <tr>
                        <td>エージェント名</td>
                        <td>件数</td>
                        <td> </td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($agent_counts as $agent_count):?>
                    <tr>
                        <td><?= $agent_count['agent_name']?></td>
                        <td><?= $agent_count['COUNT( agent_name )']?></td>
                        <td>
                            <form action="../adminDetail/adminDetail.php" method="GET" >
                                <input type="hidden" name="detail" value="<?= $agent_count['agent_name']?>">
                                <button type="submit" class="detail_button">詳細</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
                
            </table>
        </section>
    </main>
    <script src=""></script>
</body>
</html>